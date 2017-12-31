<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
      return view('registration.create');
    }

    public function store()
    {
    	// validate form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

    	// create the user
    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    	]);

    	// sign user in
    	auth()->login($user);

    	// redirect
    	return redirect()->home();
    }
}
