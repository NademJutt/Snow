<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Children;
use App\Models\Customermeta; 
use Sentinel;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.index');
    } 

    public function customerList(Request $request) 
    {
        $from_date = $request->input('from_date');
        $to_date   = $request->input('to_date');

        $role = \Sentinel::findRoleBySlug('customer');
        $query = $role->users()->with('roles');

        if($request->has('from_date') &&  $request->has('to_date')) {
          
            $query = $query->where('created_at', '>=', Carbon::parse($from_date))
                           ->where('created_at', '<=', Carbon::parse($to_date));
       }

        if($request->has('query') ) {         
            $query = User::where('first_name', 'like', '%'.$request->input('query').'%');
        }

        $users =  $query->get();

    	return view('admin.customers', compact('users'));
    }

    // Save customer by admin 
    public function storeCustomer(Request $request)
    {
        $request->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'email'           => 'required|email',
            'password'        => 'required',
        ]);

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
        return redirect()->back()->with('success', 'Customer have been saved successfully.'); 
    } 

    //Search Customer
    public function searchCustomer(Request $request){
        $data = User::
        where('first_name', 'like', '%'.$request->input('query').'%')
        ->get();
        return view('admin.search-customer',['users'=>$data]);
    }


    // Update customer 
    public function updateCustomer(Request $request, $id)
    {

        if($request->filled('password')){

            $request->validate([
                'first_name'            => 'required',
                'last_name'             => 'required',
                'password'              => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);
            $credentials = [
                    'first_name'  => $request->input('first_name'),
                    'last_name'   => $request->input('last_name'),
                    'password'   => $request->input('password')
            ];

        }else{

            $request->validate([
            'first_name'            => 'required',
            'last_name'             => 'required',
            ]);
             $credentials = [
                'first_name'  => $request->input('first_name'),
                'last_name'   => $request->input('last_name'),
            ];
        }

        $user = Sentinel::findById($id); 
    
        Sentinel::update($user, $credentials);

        $data = [
            'address'          => $request->input('address'), 
            'city'             => $request->input('city'),
            'state'            => $request->input('state'),
            'zip'              => $request->input('zip'),         
            'mobile'           => $request->input('mobile'),
            'contact'          => $request->input('contact')
        ];
        Customermeta::where('user_id', $id)->update($data);


        return redirect()->back()->with('success', 'Customer data have been Updated successfully.'); 
    }

    //Add children by admin
    public function storeChild(Request $request)
    {
        $child = new Children;
        $child->user_id      = $request->user_id;
        $child->first_name   = $request->first_name;
        $child->last_name    = $request->last_name;
        $child->category     = $request->category;
        $child->experience   = $request->experience;
        $child->dob          = $request->dob;
        $child->childphone   = $request->childphone;
        $child->gender       = $request->gender;
        $child->save();
        
        return redirect()->back()->with('success', 'Children have been saved successfully.'); 
    }

    public function updateChild(Request $request, $id)
    {
        $data = [
            'first_name'    => $request->input('first_name'), 
            'last_name'     => $request->input('last_name'),
            'category'      => $request->input('category'),
            'experience'    => $request->input('experience'),         
            'dob'           => $request->input('dob'),
            'childphone'    => $request->input('childphone'),
            'gender'        => $request->input('gender')
        ];
        Children::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Children data have been Updated successfully.'); 
    }


    public function customerShow($id)
    {
        $user = User::find($id);
    	$kids = User::find($id)->kid;
        return view('admin.customer-detail', compact('kids','user'));
    }

    public function customerDelete($id)
    {
        $kids = Children::where('user_id', $id);
        $kids->delete();
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Customer have been successfully deleted.'); 
    }
    public function childDelete($id)
    {
        $kid = Children::find($id);
        $kid->delete();
        return redirect()->back()->with('success', 'Childer have been successfully deleted.');
    }
    
}
 