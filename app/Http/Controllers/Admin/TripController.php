<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Route;

class TripController extends Controller
{
    public function trips()  
    { 	
        $trips = Trip::paginate(2);
        $routes = Route::all(); 
        return view('admin.trips', compact('trips' , 'routes'));
    } 

    public function storeTrip(Request $request)
    {
        $trip = new Trip;
        $trip->trip_name         = $request->trip_name;
        $trip->departure_date  	  = $request->departure_date;
        $trip->return_date     	   = $request->return_date;
        $trip->booking_close        = $request->booking_close;
        $trip->price    			  = $request->price;
        $trip->late_booking_date  	    = $request->late_booking_date;
        $trip->late_price     			   = $request->late_price;
        $trip->close_trip_booking   	     = $request->close_trip_booking;
        $trip->special_StaffKid_price         = $request->special_StaffKid_price;
        $trip->special_StaffKid_latePrice       = $request->special_StaffKid_latePrice;
        $trip->special_JuniorInstructor_price       = $request->special_JuniorInstructor_price;
        $trip->special_JuniorInstructor_latePrice	       = $request->special_JuniorInstructor_latePrice;
        $trip->status    						  = $request->status;
        $trip->night     					 = $request->night;
        
        $trip->save();

                              
        $route = Route::find($request->route_id);
        $trip->routes()->attach($route);


        
        return redirect()->back()->with('success', 'Trip have been saved successfully.'); 
    }

    public function updatetrip(Request $request, $id)
    {
        $data = [
            'trip_name'          => $request->input('trip_name'), 
            'departure_date'      => $request->input('departure_date'),
            'return_date'          => $request->input('return_date'),
            'booking_close'         => $request->input('booking_close'),         
            'price'                  => $request->input('price'),
            'late_booking_date'       => $request->input('late_booking_date'),
            'late_price'                => $request->input('late_price'),
            'close_trip_booking'          => $request->input('close_trip_booking'),
            'special_StaffKid_price'        => $request->input('special_StaffKid_price'),
            'special_StaffKid_latePrice'        => $request->input('special_StaffKid_latePrice'),
            'special_JuniorInstructor_price'        => $request->input('special_JuniorInstructor_price'),
            'special_JuniorInstructor_latePrice'        => $request->input('special_JuniorInstructor_latePrice'),
            'route'                                  => $request->input('route'),
            'status'                             => $request->input('status'),
            'night'                           => $request->input('night')
        ];
        Trip::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Trip data have been Updated successfully.'); 
    }

    public function deleteTrip($id)
    {
        $trip = Trip::find($id);
        $trip->delete();
        return redirect()->back()->with('success', 'Trip have been successfully deleted.');
    }

    public function searchTrip(Request $request){
        $data = Trip::
        where('trip_name', 'like', '%'.$request->input('query').'%')
        ->get();
        return view('admin.search-trip',['trips'=>$data]);
    }
}
