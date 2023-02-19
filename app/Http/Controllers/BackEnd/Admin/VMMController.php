<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\VMM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class VMMController extends Controller
{
    public function create(){
        return view('admin.vmm_create');
    }

    public function store(Request $request){

        $rules = [
            'title' => ['required'],
            'minimum_invest' => ['required'],
            'distribute_coin' => ['required'],
            'execution_time' => ['required'],
            'prepration_time' => ['required'],
            'start_time' => ['required'],
            'status' => ['required'],
        ];
        $this->validate($request, $rules);

        try {

            $vmmObj = new VMM();
            $vmmObj->title= $request->title;
            $vmmObj->minimum_invest = $request->minimum_invest;
            $vmmObj->distribute_coin = $request->distribute_coin;
            $vmmObj->prepration_time = $request->prepration_time;
            $vmmObj->start_time = date('Y-m-d H:i:s', strtotime($request->start_time));
            $vmmObj->status = $request->status;
            $vmmObj->save();

            if($vmmObj && $vmmObj!=null){

                return redirect('/admin/vmm-create')->with('success', 'Create successfully!');

            }else{

                return redirect::back()->withErrors(['error' => 'Something went wrong!']);
            }

        }catch (\Exception $e){
            dd($e->getMessage(),$e->getLine());
            return redirect::back()->withErrors(['error' => 'Something went wrong!']);
        }


    }

}
