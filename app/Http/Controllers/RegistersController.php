<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class RegistersController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'businessname' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'state' => 'required',
            'businessemail' => 'required|email|unique',
            'password' => 'required|confirmed'
        ]);

        $businesses = new Business;
        $businesses ->businessname = $request->input('businessname');
        $businesses ->address1 = $request->input('address1');
        $businesses ->address2 = $request->input('address2');
        $businesses ->city = $request->input('city');
        $businesses ->zipcode = $request->input('zipcode');
        $businesses ->state = $request->input('state');
        $businesses ->businessemail = $request->input('businessemail');
        $businesses ->password = $request->input('password');
        $businesses ->confirmpassword = $request->input('confirmpassword');
        $businesses ->save();
        return redirect('/response')->with('response', 'Thanks for regestering with Tagg. You will be notfied shortly with your account details');

    }
}