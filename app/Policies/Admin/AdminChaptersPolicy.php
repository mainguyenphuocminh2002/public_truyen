<?php

namespace App\Policies\Admin;

use App\Models\Admin\Products;
use App\Models\Chapters;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminChaptersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    private const ADMIN = 'admin';
    private const GUEST = 'guest';

    private $viewChapters;
    private $createChapters;
    private $updateChapters;
    private $deleteChapters;

    public function __construct()
    {
        $this->viewChapters = config('Admin.Permission.KeyCode.Chapters.ViewChapters');
        $this->createChapters = config('Admin.Permission.KeyCode.Chapters.CreateChapters');
        $this->updateChapters = config('Admin.Permission.KeyCode.Chapters.UpdateChapters');
        $this->deleteChapters = config('Admin.Permission.KeyCode.Chapters.DeleteChapters');
        # code...
    }

    public function viewAnyChapters(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chapters  $chapters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewChapters(User $user)
    {
        //
        if ($user->CheckPermission($this->viewChapters)){
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
    public function createChapters(User $user)
    {
        //
        if ($user->CheckPermission($this->createChapters))
            return true;
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chapters  $chapters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateChapters(User $user,Products $product)
    {
        $userPosts = $user->products;
        foreach ($userPosts as $value) {
            if($value->id === $product->id){
                return true;
            }
        }
        if($user->checkRole($this::ADMIN)){
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chapters  $chapters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteChapters(User $user,Products $product)
    {
        //
        $userPosts = $user->products;
        foreach ($userPosts as $value) {
            if($value->id === $product->id){
                return true;
            }
        }
        if($user->checkRole($this::ADMIN)){
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chapters  $chapters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreChapters(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chapters  $chapters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteChapters(User $user)
    {
        //
    }
}
