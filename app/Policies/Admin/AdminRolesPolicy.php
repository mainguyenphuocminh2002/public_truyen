<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Admin\Roles;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminRolesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    private $viewRoles;
    private $createRoles;
    private $updateRoles;
    private $deleteRoles;
    public function __construct()
    {
        $this->viewRoles = config('Admin.Permission.KeyCode.Roles.ViewRoles');
        $this->createRoles = config('Admin.Permission.KeyCode.Roles.CreateRoles');
        $this->updateRoles = config('Admin.Permission.KeyCode.Roles.UpdateRoles');
        $this->deleteRoles = config('Admin.Permission.KeyCode.Roles.DeleteRoles');
    }

    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewRoles(User $user)
    {
        if ($user->CheckPermission($this->viewRoles))
                return true;
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createRoles(User $user)
    {
        if ($user->CheckPermission($this->createRoles))
            return true;
        
        return false;
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateRoles(User $user)
    {
        if ($user->CheckPermission($this->updateRoles)) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteRoles(User $user)
    {
        //
        if ($user->CheckPermission($this->deleteRoles))
            return true;
        //
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Roles $roles)
    {
        //
    }
}
