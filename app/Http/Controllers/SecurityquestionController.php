<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Securityquestion;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\withErrors;

class SecurityquestionController extends Controller
{

    public function index()
    {
        //
        $securityquestions=Securityquestion::all();
        return view('securityquestions.index',compact('securityquestions'));
    }

//    public function show($id)
//    {
//        $securityquestion=Securityquestion::find($id);
//        return view('securityquestions.show',compact('securityquestion'));
//    }


    public function create()
    {
        $users = Auth::id();
//        $users = User::pluck('name','id');
        return view('securityquestions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {//dd($request);
        $securityquestion= new Securityquestion($request->all());

        $validator = Validator::make($request->all(), [
            'question1' => 'required|max:255',
            'answer1' => 'required',
            'question2' => 'required|max:255',
            'answer2' => 'required',
            'question3' => 'required|max:255',
            'answer3' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('securityquestions/create')
                ->withErrors($validator)
                ->withInput();
        }

        $securityquestion->save();


        return redirect('/home');
//        return redirect('securityquestions');
    }

    public function insertcheck()
    {
        $users = Auth::id();
        $securityquestion = Securityquestion::find($users);
        return view('securityquestions.insertcheck', compact('securityquestion'));
    }

    public function check(Request $request)
    {
        $checkanswer1 = $request->a1;
        $checkanswer2 = $request->a2;
        $checkanswer3 = $request->a3;

        $userId = Auth::id();

        $answers = Securityquestion::findOrFail($userId);
        $securityAnswer1 = $answers->answer1;
        $securityAnswer2 = $answers->answer2;
        $securityAnswer3 = $answers->answer3;

        if (($securityAnswer1 == $checkanswer1) && ($securityAnswer2 == $checkanswer2) && ($securityAnswer3 == $checkanswer3)) {

            Session::flush();
            return redirect()->route('password.request');
        }
        else {
            return back()->with('error', '* Answers do not match the record.');
        }
    }


    /*public function edit($id)
    {
        $securityquestion=Securityquestion::find($id);
        return view('securityquestions.edit',compact('securityquestion'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
//    public function update($id)
//    {
//        //
//        $securityquestionUpdate=Request::all();
//        $securityquestion=Securityquestion::find($id);
//        $securityquestion->update($securityquestionUpdate);
//        return redirect('securityquestions');
//    }

    public function destroy($id)
    {
        Securityquestion::find($id)->delete();
        return redirect('securityquestions');
    }
}