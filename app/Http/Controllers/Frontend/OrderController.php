<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Children;
use App\Models\Customermeta;
use Sentinel;
use Session;
use App\Models\Trip;
use App\Models\Route;

class OrderController extends Controller
{
    public function storeOrder(Request $request){
    	return $request->input();
    }
}
