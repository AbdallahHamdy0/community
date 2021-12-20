<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sessioncontroller extends Controller
{
    public function create(){

        return view('login');
    }

    public function store(Request $request){

        // create user 
        if(!auth()->attempt(request(['email','password']))){

            return back()->withErrors([
                'message'=>'Email Or Password is not correct',
            ]);
        }

        // redirect
        return redirect('/');

    }

  public function destroy(){
      auth()->logout();
      return redirect('/login');

  }
}
