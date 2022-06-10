<?php

namespace App\Policies\Admin;

use App\Models\Categorys;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminCategorysPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    private $viewCategorys;
    private $createCategorys;
    private $updateCategorys;
    private $deleteCategorys;

    public function __construct()
    {
        # code...
        $this->viewCategorys = config('Admin.Permission.KeyCode.Categorys.ViewCategorys');
        $this->createCategorys = config('Admin.Permission.KeyCode.Categorys.CreateCategorys');
        $this->updateCategorys = config('Admin.Permission.KeyCode.Categorys.UpdateCategorys');
        $this->deleteCategorys = config('Admin.Permission.KeyCode.Categorys.DeleteCategorys');
    }

    public function viewAnyCategorys(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewCategorys(User $user)
    {
        //
        if ($user->CheckPermission($this->viewCategorys))
                return true;
        //
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createCategorys(User $user)
    {
        //
        if($user->CheckPermission($this->createCategorys)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateCategorys(User $user)
    {
        //
        if($user->CheckPermission($this->updateCategorys)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteCategorys(User $user)
    {
        //
        if($user->CheckPermission($this->deleteCategorys)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreCategorys(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteCategorys(User $user)
    {
        //
    }
}
