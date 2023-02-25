<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\UserInvest;
use App\Models\VMM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class VmmCronScriptController extends Controller
{
    public function script(){

        date_default_timezone_set('Asia/Dhaka');

        $getAllActiveVmm = VMM::where('status','active')->get();

        if(count($getAllActiveVmm)>0){
            foreach ($getAllActiveVmm as $key=>$vmm) {

                if (date('Y-m-d h:i', strtotime($vmm->start_time)) == date('Y-m-d h:i')) {

                    $vmmautiomation = $this->vmmAutomation($vmm);
                    if($vmmautiomation){
                        $vmmFinished = VMM::where("id", $vmm->id)->update(["status" => 'finished']);
                        if($vmmFinished){
                            $cloneVmmObj = new VMM();
                            $cloneVmmObj->title = $vmm->title;
                            $cloneVmmObj->lifetime = $vmm->lifetime;
                            $cloneVmmObj->minimum_invest = $vmm->minimum_invest;
                            $cloneVmmObj->distribute_coin = $vmm->distribute_coin;
                            $cloneVmmObj->prepration_time = $vmm->prepration_time;
                            $cloneVmmObj->execution_time = $vmm->execution_time;
                            $cloneVmmObj->start_time = date('Y-m-d h:i:s', strtotime($vmm->start_time.'+1 hours'));;
                            $cloneVmmObj->status = $vmm->status;
                            $cloneVmmObj->save();
                        }
                    }
                }

            }
        }

    }

    public function vmmAutomation($vmm){
        $getInvestUserForVmm = UserInvest::where('vmm_id',$vmm->id)
        ->where('status','running')
        ->get();

        if(count($getInvestUserForVmm)>0){

            //count all user ticket
            $totalTicketCountPerUser=[];
            foreach($getInvestUserForVmm as $user){
                $totalTicket = (int) round($user->invest_ammount/$vmm->minimum_invest);
                for ($i=1; $i<=$totalTicket; $i++){
                    array_push($totalTicketCountPerUser,$user->user_id);
                }
            }

            //select winner base on vmm execution time
            $executeTimeCount = 0;
            $distribute_coin = $vmm->distribute_coin;
            $bonusCoin=0;
            $remainingCoin=0;

            //distributes coin
            if($vmm->distribute_coin % $vmm->execution_time == 0){
                $bonusCoin = $distribute_coin/$vmm->execution_time;
            }else{
                $bonusCoin = (int) floor($distribute_coin/($vmm->execution_time-1));
                $remainingCoin = $distribute_coin - $bonusCoin;
            }

            for ($j=1; $j<=$vmm->execution_time; $j++){

                $executeTimeCount++;

                $winner_key = array_rand($totalTicketCountPerUser);

                //save coin
                $winInvestUser = UserInvest::where('user_id',$totalTicketCountPerUser[$winner_key])->first();
                $winInvestUser->bolus_count = $winInvestUser->bolus_count+1;

                if(($vmm->distribute_coin % $vmm->execution_time == 1) && ($executeTimeCount == $vmm->execution_time)){
                    $winInvestUser->bolus_ammount = $winInvestUser->bolus_ammount + $remainingCoin;
                }else{
                    $winInvestUser->bolus_ammount = $winInvestUser->bolus_ammount + $bonusCoin;
                }

                $winInvestUser->save();

                unset($totalTicketCountPerUser[$winner_key]);

            }
        }

        if($executeTimeCount != $vmm->execution_time){
            return false;
        }

        foreach($getInvestUserForVmm as $user){
            UserInvest::where("user_id", $user->user_id)->update(["status" => 'finished']);
        }

        return true;
    }
}
