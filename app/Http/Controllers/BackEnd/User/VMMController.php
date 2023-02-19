<?php

namespace App\Http\Controllers\BackEnd\User;

use App\Http\Controllers\Controller;
use App\Models\VMM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class VMMController extends Controller
{
    public function index(){
        return view('user.vmm');
    }

}
