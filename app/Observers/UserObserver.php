<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{

    public function updating(User $user)
    {
        // si originalPassword('password') !== nuevoPassword('password34') getOriginal()
        if ($user->password) {
            $user->password = bcrypt($user->password);
        } else {
            $user->password = $user->getOriginal('password');
        }
    }
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
    }
}
