<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Children;
use App\Models\Customermeta;
use Sentinel;
use Session;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $customer =  Sentinel::getUser();
        $kids = Children::where('user_id', $customer->id)->get();
        return view('frontend.index', compact('customer', 'kids'));
    } 

    public function children()
    {
        $customer =  Sentinel::getUser();
        $kids = Children::where('user_id', $customer->id)->get();
        return view('frontend.children', compact('customer', 'kids'));
    } 

    // Update customer 
    public function updateCustomer(Request $request)
    {
        $user =  Sentinel::getUser();

        $request->validate([
            'first_name'            => 'required',
            'last_name'             => 'required',
        ]);

        $credentials = [
                'first_name'  => $request->input('first_name'),
                'last_name'   => $request->input('last_name'),
        ];

        if($request->filled('password')){ 

            $request->validate([
                'password'            => 'required|confirmed',
            ]);

            array_push($credentials, ['password'   => $request->input('password')]);
        }

        Sentinel::update($user, $credentials);

        $data = [
            'address'          => $request->input('address'), 
            'city'             => $request->input('city'),
            'state'            => $request->input('state'),
            'zip'              => $request->input('zip'),         
            'mobile'           => $request->input('mobile'),
            'contact'          => $request->input('contact')
        ];
        Customermeta::where('user_id', $user->id)->update($data);

        return redirect()->back()->with('success', 'Customer data have been Updated successfully.');

        
        
    }

   //Save children by Customer 
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
        
        // put validations here 

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

    public function childDelete($id)
    {
        $kid = Children::find($id);
        $kid->delete();
        return redirect()->back()->with('success', 'Childer have been deleted successfully.');
    }
}
