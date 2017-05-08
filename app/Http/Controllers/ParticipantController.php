<?php

namespace App\Http\Controllers;


use App\Participant;

class ParticipantController extends Controller
{
    public function setvote($uid,$qrcode){
        $user = Participant::find($uid);
        if($user){
            $user->voted = $qrcode;
            $user->save();
            return Array([
                'uid'=>$user->id,
                'name'=>$user->name,
                'status'=>'success',
                'created_at'=>$user->created_at,
                'updated_at'=>$user->updated_at
            ]);
        }else{
            return Array([
                'status'=>'failed',
                'error'=>'participant not found'
            ]);
        }
    }
}
