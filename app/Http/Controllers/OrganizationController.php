<?php

namespace App\Http\Controllers;

use App\Custom\Constant;
use App\Organization;
use App\Organization_type;
use App\ParentChildOrganizations;
use App\State;
use App\Subscription;
use App\User;
use Auth;
use Billable;
use Illuminate\Http\Request;
use Validator;


class OrganizationController extends Controller
{

    public function index()
    {
        $organizationId = Auth::user()->organization_id;
        $loggedOnUserOrganization = Organization::where('id', '=', $organizationId)->get();
        $childOrganizationIds = ParentChildOrganizations::active()->where('parent_org_id', '=', $organizationId)->pluck('child_org_id');
        $childOrganizations = Organization::active()->whereIn('id', $childOrganizationIds)->get();

        $count = $childOrganizations->count();
        $subscriptionQuantity = Subscription::where('organization_id', $organizationId)->value('quantity');
        $subscriptionEnds = Subscription::where('organization_id', $organizationId)->value('ends_at');
        $subscription = $subscriptionQuantity - 1;
        return view('organizations.index', compact('loggedOnUserOrganization', 'childOrganizations', 'count', 'subscriptionQuantity', 'subscription', 'subscriptionEnds'));

    }

    public function edit($id)
    {
        $id = decrypt($id);
        if (in_array($id, $this->getAllMyOrganizationIds())) {
            $organization = Organization::find($id);
            $states = State::pluck('state_name', 'state_code');
            $Organization_types = Organization_type::pluck('type_name', 'id');
            return view('organizations.edit', compact('organization', 'states', 'Organization_types'));
        } else {
            return redirect('/home')->withErrors(array('0' => 'You do not have access to view this Business!!'));
        }

    }


    public function update(Request $request, $id)
    {
        if (in_array($id, $this->getAllMyOrganizationIds())) {
            $validator = Validator::make($request->all(), [
                'phone_number' => 'required|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
                'zip_code' => 'required|regex:/[0-9]{5}/',
                'state' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $organization = Organization::find($id);
            $organization->org_name = $request->org_name;
            $organization->org_description = $request->org_description;
            $organization->street_address1 = $request->street_address1;
            $organization->street_address2 = $request->street_address2;
            $organization->city = $request->city;
            $organization->state = $request->state;
            $organization->zipcode = $request->zip_code;
            $organization->phone_number = $request->phone_number;
            $organization->save();

            // If user is editing their own organization then redirect back to their business profile page
            // If user is parent organization and try to edit a child organization then redirect to organizations page
            // else redirect users to home page with error that access is denied
            if ($id == Auth::user()->organization_id) {
                return redirect()->route('organizations.edit', encrypt($id));
            } elseif ($ParentOrgId = ParentChildOrganizations::active()->where('child_org_id', $id)->first()->parent_org_id) {
                if (Auth::user()->organization_id == $ParentOrgId) {
                    return redirect('organizations');
                }
            } else {
                return redirect('home')->withErrors(array('0' => 'You do not have access to change this Business!!'));
            }
        } else {
            return redirect('home')->withErrors(array('0' => 'You do not have access to change this Business!!'));
        }
        return redirect('home')->withErrors(array('0' => 'You do not have access to change this Business!!'));
    }


    protected function validatorLocation($data)
    {
        return Validator::make($data->toArray(), [
            'org_name' => 'required|string|max:255',
            'organization_type_id' => 'required',
            'street_address1' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'required|regex:/[0-9]{5}/',
            'phone_number' => 'required|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
        ]);
    }

    public function createOrganization()
    {
        $states = State::pluck('state_name', 'state_code');
        $Organization_types = Organization_type::pluck('type_name', 'id');
        return view('organizations.create', compact('states', 'Organization_types'));
    }

    /**
     * Creating a new Organization
     *
     * @param Request $request
     * @return mixed
     */
    protected function create(Request $request)
    {
        /*return Validator::make($request->all(), [
            'org_name' => 'required|string|max:255',
            'organization_type_id' => 'required',
            'street_address1' => 'required|string|max:255',
            'street_address2' => 'string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'required',
            'phone_number' => 'required',
        ]);*/

        // Add validation
        $organization = new Organization;
        $organization->org_name = $request['org_name'];
        $organization->org_description = $request['org_description'];
        $organization->organization_type_id = Auth::user()->organization->organizationType->id;
        $organization->street_address1 = $request['street_address1'];
        $organization->street_address2 = $request['street_address2'];
        $organization->city = $request['city'];
        $organization->state = $request['state'];
        $organization->zipcode = $request['zipcode'];
        $organization->phone_number = $request['phone_number'];
        $validator = $this->validatorLocation($organization);//dd($validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $organization->save();

        // Inserting the relation between parent organization and child organization
        ParentChildOrganizations::create(['parent_org_id' => Auth::user()->organization_id, 'child_org_id' => $organization->id]);

        //$childOrganizations = ParentChildOrganizations::where('parent_org_id', '=', Auth::user()->organization_id)->get();
        return redirect()->route("organizations.index")->with('message', 'Successfully added the Business Location');
    }

    public function destroy($id)
    {
        if (in_array($id, $this->getAllMyOrganizationIds())) {
            $organization = Organization::find($id);
            $organization->active = Constant::INACTIVE;
            $organization->save();
            $users = User::active()->where('organization_id', $id);
            $users->update(['active' => Constant::INACTIVE]);
            return redirect()->back()->with('message', 'Successfully deactivated the Business Location');
        } else {
            return redirect('organizations')->withErrors(array('0' => 'You do not have access to remove this Business!!'));
        }
    }

// include organization id in the donation request URL//
    protected function getAllMyOrganizationIds()
    {
        $organization = Auth::user()->organization;
        $arr = ParentChildOrganizations::active()->where('parent_org_id', $organization->id)->pluck('child_org_id')->toArray();
        //$arr = Organization::active()->whereIn('id', $arr)->pluck('id')->toArray();
        array_push($arr, $organization->id);
        return $arr;
    }
}
