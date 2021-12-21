<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mailDetail(Request $request){

    	$id = $request->input('id');

    	$customer = User::find($id);

    	$filename = $customer->first_name.".html";

    	$file = Storage::disk('local')->get($filename);

    	// dd($file);

    	return ["file" => $file];

    	//return view('admin.mail-detail', compact('file'));
    }
    public function resendMail($id)
    {
    	$customer = User::find($id);

    	Mail::send('mails.ordered', $customer->toArray(),
            function($message) use ( $customer ) {
             $message->to($customer->email);

             $message->subject("Hello $customer->first_name,
                        Your order submitted successfully.");
        }); 

        return redirect()->back()->with('success', 'Order confirmation mail have been sent to the customer successfully.');

    }
}
