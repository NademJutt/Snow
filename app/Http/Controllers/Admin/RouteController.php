<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
     public function routes() 
    { 	
        $routes = Route::all();
        return view('admin.routes', compact('routes'));
    } 

    public function storeRoute(Request $request)
    {
        $route = new Route;
        $route->route_name        	  = $request->route_name;
        $route->route_description     = $request->route_description;
        $route->route_status          = $request->route_status;
        $route->display_order   	  = $request->display_order;
         
        $route->save(); 
        
        return redirect()->back()->with('success', 'Route have been saved successfully.'); 
    }

    public function routeShow($id)
    {
        $route = Route::find($id);
        $locations = Route::find($id)->location;
        return view('admin.route-detail', compact('locations','route'));
    }
}
