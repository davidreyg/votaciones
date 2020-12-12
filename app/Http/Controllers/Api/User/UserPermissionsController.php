<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\Permission\PermissionCollection;

class UserPermissionsController extends AppBaseController
{

    /** @var  userRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        // return $request->all();
        $permissions = $user->permissions()->get();
        return $this->showAll(new PermissionCollection($permissions));
    }
}
