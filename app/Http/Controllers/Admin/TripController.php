<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function trips() 
    { 	
        $trips = Trip::all();
        return view('admin.trips', compact('trips'));
    }
}
