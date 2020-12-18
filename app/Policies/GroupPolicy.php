<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Setting;
use App\Models\Employee;
use App\Models\Group;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $electionSetting = Setting::getSetting('default_election');
        if (!$electionSetting) {
            return Response::deny('Aun no hay una eleccion definida. Por favor comunicar al ADMINISTRADOR.', 403);
        }
        return $user->hasRole(['admin', 'comite', 'elector']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function view(User $user, Group $group)
    {
        // return $user->hasRole(['admin', 'comite', 'elector']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $electionSetting = Setting::getSetting('default_election');
        if (!$electionSetting) {
            return $this->deny('Aun no hay una eleccion definida. Por favor comunicar al ADMINISTRADOR.', 403);
        }

        return $user->hasRole(['admin', 'comite']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function update(User $user, Group $group)
    {
        return $user->hasRole(['admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function delete(User $user, Group $group)
    {
        return $user->hasRole(['admin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Group  $group
     * @return mixed
     */
    public function restore(User $user, Group $group)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function forceDelete(User $user, Group $group)
    {
        //
    }
}
