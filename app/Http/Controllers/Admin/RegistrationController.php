<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;

class RegistrationController extends Controller
{
    public function register()   
    {
    	return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
    	$user = Sentinel::registerAndActivate($request->all());

    	$role = Sentinel::findRoleBySlug('customer');
    	$role->users()->attach($user);

    	return redirect('/login');

    }
}
