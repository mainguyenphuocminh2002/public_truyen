<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Admin\Products;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminProductsPolicy
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


    private $viewProducts;
    private $createProducts;
    private $updateProducts;
    private $deleteProducts;
    public function __construct()
    {
        $this->viewProducts = config('Admin.Permission.KeyCode.Products.ViewProducts');
        $this->createProducts = config('Admin.Permission.KeyCode.Products.CreateProducts');
        $this->updateProducts = config('Admin.Permission.KeyCode.Products.UpdateProducts');
        $this->deleteProducts = config('Admin.Permission.KeyCode.Products.DeleteProducts');
    }


    public function viewAnyProducts(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewProducts(User $user)
    {
        // Cho quyen create voiw view
        // User

        
        if ($user->CheckPermission($this->viewProducts)){
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
    public function createProducts(User $user)
    {
        //
        if ($user->CheckPermission($this->viewProducts))
                return true;
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateProducts(User $user, Products $products)
    {
        //User la cung id thi cho update 
        // admin free to play
        $userPosts = $user->products;
        foreach ($userPosts as $value) {
            if($value->id === $products->id){
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
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteProducts(User $user, Products $products)
    {
        //admin
        $userPosts = $user->products;
        foreach ($userPosts as $value) {
            if($value->id === $products->id){
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
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Products $products)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Products $products)
    {
        //
    }
}
