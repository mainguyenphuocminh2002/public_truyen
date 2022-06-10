<?php

namespace App\Policies\Admin;

use App\Models\Authors;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminAuthorsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    private $viewAuthors;
    private $createAuthors;
    private $updateAuthors;
    private $deleteAuthors;

    public function __construct()
    {
        $this->viewAuthors = config('Admin.Permission.KeyCode.Authors.ViewAuthors');
        $this->createAuthors = config('Admin.Permission.KeyCode.Authors.CreateAuthors');
        $this->updateAuthors = config('Admin.Permission.KeyCode.Authors.UpdateAuthors');
        $this->deleteAuthors = config('Admin.Permission.KeyCode.Authors.DeleteAuthors');
        # code...
    }

    public function viewAnyAuthors(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAuthors(User $user)
    {
        //
        if($user->CheckPermission($this->viewAuthors)){
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
    public function createAuthors(User $user)
    {
        //
        if($user->CheckPermission($this->createAuthors)){
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateAuthors(User $user)
    {
        //
        if($user->CheckPermission($this->updateAuthors)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAuthors(User $user)
    {
        //
        if($user->CheckPermission($this->deleteAuthors)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAuthors(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAuthors(User $user)
    {
        //
    }
}
