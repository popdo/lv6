<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 权限:仅能操作自己
    public function self (User $this_user,User $user){
        return $this_user->is_admin || $this_user->id === $user->id;
    }
    // 权限:不能操作自己-管理员
    public function admin_unself (User $this_user,User $user){
        return $this_user->is_admin && $this_user->id !== $user->id;
    }

    // 关注权限：不能关注自己
    public function follow(User $currentUser,User $user){
        return $currentUser->id !== $user->id;
    }
}
