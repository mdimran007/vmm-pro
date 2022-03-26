<?php

namespace App\Http\Controllers\BackEnd\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index(){
    	return view('user.user_dashboard');
    }
}
