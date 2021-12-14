<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{ 
     public function routes(Request $request) 
    { 	 
        $query = Route::query();

        if($request->has('query') ) {         
            $query = Route::where('route_name', 'like', '%'.$request->input('query').'%');
        }

        $routes =  $query->get();

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

    public function deleteRoute($id)
    {
        $route = Route::find($id);
        $route->delete();
        return redirect()->back()->with('success', 'Route have been successfully deleted.');
    }

    public function updateRoute(Request $request, $id)
    {
        $data = [
            'route_name'             => $request->input('route_name'), 
            'route_description'      => $request->input('route_description'), 
            'route_status'           => $request->input('route_status'), 
            'display_order'          => $request->input('display_order')   
        ];
        Route::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Route data have been Updated successfully.'); 
    }
}
