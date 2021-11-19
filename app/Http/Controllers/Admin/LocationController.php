<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function locations() 
    { 	
        $locations = Location::all();
        return view('admin.routes', compact('locations'));
    } 
}
