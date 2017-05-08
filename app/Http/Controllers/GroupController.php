<?php

namespace App\Http\Controllers;

use App\Group;
use App\Participant;

class GroupController extends Controller
{
    public function getvotes($id){
        $group = Group::find($id);
        if($group){
            $user = Participant::whereVoted($group->qrcode)->get();
            return Array([
                'group_id'=>$group->id,
                'group_name'=>$group->name,
                'vote_count'=>count($user),
                'voters'=>$user
            ]);
        }else{
            return Array([
                'status'=>'failed',
                'error'=>'group not found'
            ]);
        }

    }
}
