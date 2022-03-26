<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

		
		
    	if(Auth::user()->utype==='ADM'){
			

    		return redirect()->route('admin.dashboard');

    	}else if(Auth::user()->utype==='VEN'){
			return redirect()->route('vendor.dashboard');
		}
		else if(Auth::user()->utype==='USR'){
			return redirect()->route('user.dashboard');

		}
    	else{
			
    		// return false;
    	}

		
    	
    }
}
