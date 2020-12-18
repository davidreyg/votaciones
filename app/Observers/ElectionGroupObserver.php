<?php

namespace App\Observers;

use App\Models\User;
use App\Models\ElectionGroup;

class ElectionGroupObserver
{
    public function created(ElectionGroup $electionGroup)
    {
        $user = User::find($electionGroup->user_id);
        $user->status = 'I';
        $user->save();
    }
}
