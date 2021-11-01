<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Children;
use Sentinel;
 
class LoginController extends Controller
{
    public function login() 
    {
    	return view('authentication.login'); 
    }

    public function postLogin(Request $request)
    {
        $user = Sentinel::authenticate($request->all());

        if($user){
            $slug = Sentinel::getUser()->roles()->first()->slug;
            // dd($slug); 
            if ($slug == 'admin') {
                return redirect('/admin_dashboard');
            }elseif ($slug == 'customer') {
                return redirect('/customer_dashboard');
            }

        }else{
            return redirect()->back()->with(['error' => 'Wrong Credentials.']);
        }

        
    }

    public function logout()
    {
    	Sentinel::logout();
    	return redirect('/login');
    }
}
