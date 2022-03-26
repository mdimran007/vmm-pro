<?php

namespace App\Http\Controllers\BackEnd\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index(){
           
    	return view('vendor.vendor_dashboard');
    }
}
