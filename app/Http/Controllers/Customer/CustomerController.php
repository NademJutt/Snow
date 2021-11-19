<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Mail;
use App\Models\Children;
use App\Models\Customermeta;
use Sentinel;
use Session;
//use App\Mail\CustomerMail;

class CustomerController extends Controller
{ 
    public function addChild(Request $request)
    {

    	$request->session()->forget('kids');
        $request->session()->forget('child');
        
        $memberships = $request->input('memberships');
        
        // set in seession 
    	$request->session()->flash('kids' ,$memberships);     

        // set varible from sesssion 
        $number_of_childern = session('kids'); 

    	return view('customer.create_customer', compact('number_of_childern'));
    	
    }

    public function storeChildren(Request $request)
    {         
            
        $request->validate([
            'childern'      => 'required|array',
        ]);  

        $childrens = $request['childern']; 
        session()->put('child',$childrens);
        return view('customer.parent-info');
    }

    public function storeCustomer(Request $request)
    {
       
        // $request->validate([
        //     'first_name'            => 'required',
        //     'last_name'             => 'required',
        //     'email'                 => 'required|email',
        //     'password'              => 'required|confirmed',
        //     'password_confirmation' => 'required'
        // ]);

        $credentials = [
                'first_name'  => $request->input('first_name'),
                'last_name'   => $request->input('last_name'),
                'email'       => $request->input('email'),
                'password'    => $request->input('password')
        ];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('customer');
        $role->users()->attach($user);
        $user->save();

        Customermeta::create([
            'user_id'          => $user['id'],
            'address'          => $request->address,
            'city'             => $request->city,
            'state'            => $request->state,
            'zip'              => $request->zip,         
            'mobile'           => $request->mobile,
            'contact'          => $request->contact,
        ]);

        $childrens = session('child'); 
      

        foreach ($childrens as $childern) {
            
            $child = new Children;
            $child->first_name   = $childern['first_name'];
            $child->last_name    = $childern['last_name'];
            $child->category     = $childern['category'];
            $child->experience   = $childern['experience'];
            $child->dob          = $childern['dob'];
            $child->childphone   = $childern['childphone'];
            $child->gender       = $childern['gender'];
            $child->user_id      =  $user['id'];
            $result = $child->save();     
        }

        Mail::send('mails.customer', $user->toArray(), 
            function($message) use ($user ) {
             $message->to($user->email);

             $message->subject("Hello $user->first_name,
                        reset your password.");
        });


        return redirect('/thankyou');
    }

    public function thankYou()
    {
        return view('customer.thankyou');
    }
}
