<?php

namespace App\Policies\Admin;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    private $user;

    private $viewUser;
    private $createUser;
    private $updateUser;
    private $deleteUser;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->viewUser   = config('Admin.Permission.KeyCode.Users.ViewUsers');
        $this->createUser = config('Admin.Permission.KeyCode.Users.CreateUsers');
        $this->updateUser = config('Admin.Permission.KeyCode.Users.UpdateUsers');
        $this->deleteUser = config('Admin.Permission.KeyCode.Users.DeleteUsers');
        # code...
    }
    public function viewAnyUser(User $user)
    {
        // if($this->user->CheckPermission($this->viewUser)){
            return true;
        // }
        return false;//
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewUser(User $user)
    {
        if($this->user->CheckPermission($this->viewUser)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createUser(User $user)
    {
        if($this->user->CheckPermission($this->createUser)){
            return true;
        }
        return false;
        //

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateUser(User $user)
    {
        //
        if($this->user->CheckPermission($this->updateUser)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteUser(User $user)
    {
        if($this->user->CheckPermission($this->deleteUser)){
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
