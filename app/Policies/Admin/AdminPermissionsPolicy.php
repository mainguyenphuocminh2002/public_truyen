<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Admin\Permissions;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPermissionsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    private $viewPermissions;
    private $updatePermissions;
    private $createPermissions;
    private $deletePermissions;
    public function __construct()
    {
        $this->viewPermissions = config('Admin.Permission.KeyCode.Permissions.ViewPermissions');
        $this->updatePermissions = config('Admin.Permission.KeyCode.Permissions.UpdatePermissions');
        $this->createPermissions = config('Admin.Permission.KeyCode.Permissions.CreatePermissions');
        $this->deletePermissions = config('Admin.Permission.KeyCode.Permissions.DeletePermissions');
        # code...
    }
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewPermissions(User $user)
    {
        if($user->CheckPermission($this->viewPermissions)){
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
    public function createPermissions(User $user)
    {
        //
        if($user->CheckPermission($this->createPermissions))
            return true;
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updatePermissions(User $user)
    {
        //
        if($user->CheckPermission($this->updatePermissions))
            return true;
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deletePermissions(User $user)
    {
        //
        if($user->CheckPermission($this->deletePermissions))
            return true;
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Permissions $permissions)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Permissions $permissions)
    {
        //
    }
}
