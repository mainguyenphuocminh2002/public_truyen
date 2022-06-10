<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\UserController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAuthorsController;
use App\Http\Controllers\Admin\AdminChaptersController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Clients\ClientWatchController;
use App\Http\Controllers\Admin\AdminCategorysController;
use App\Http\Controllers\Clients\ClientDetailController;
use App\Http\Controllers\Admin\AdminPermissionsController;
use App\Http\Controllers\Clients\ClientCategorysController;
use App\Http\Controllers\Clients\EditProductController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Register;
use App\Models\Admin\Products;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Clients



Route::post('checkLoginUser',function(){
    //Code Here...
        if(Auth::check()){
            return Auth::check();
        }else{
            return 0;
        }
    
    })->name('checkLoginUser');
    

Route::prefix('/')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('clients.home');
    Route::get('logout',[UserController::class,'logout'])->name('clients.logout');
    
    Route::get('profile',[UserController::class,'profile'])->name('clients.profile');
    
    Route::post('profile',[UserController::class,'profileStore'])->name('clients.profile.store');
    
    Route::get('favourites',[UserController::class,'favourites'])->name('clients.favourites');

    Route::get('ticket',[UserController::class,'ticket'])->name('clients.ticket');
    
    Route::get('editProduct',[EditProductController::class,'index'])->name('clients.editProducts');
    
    Route::get('editProduct/create',[EditProductController::class,'createProduct'])->name('clients.editProducts.create');

    Route::get('categorys/view',[ClientCategorysController::class,'highView'])->name('Clients.categorys.highView');
    
    Route::get('categorys/favorites',[ClientCategorysController::class,'favorites'])->name('Clients.categorys.favorites');
    
    Route::get('categorys/comments',[ClientCategorysController::class,'comments'])->name('Clients.categorys.comments');

    Route::get('categorys/newUpdate',[ClientCategorysController::class,'newUpdate'])->name('Clients.categorys.newUpdate');
    
    Route::get('categorys/newCreate',[ClientCategorysController::class,'newCreate'])->name('Clients.categorys.newCreate');

    Route::get('categorys/quantityChapter',[ClientCategorysController::class,'quantityChapter'])->name('Clients.categorys.quantityChapter');
    
    Route::get('categorys/{id?}',[ClientCategorysController::class,'category'])->name('Clients.categorys');
    
    Route::get('detail/{alias}',[ClientDetailController::class,'detail'])->name('Clients.detail')->where(['id'=>'.+\w']);

    Route::get('watch/{alias}/{chap?}',[ClientWatchController::class,'watch'])->name('Clients.watch');
    
    Route::post('buyChapter/{price?}',[ClientWatchController::class,'buyChapter'])->name('clients.buyChapter');
});

// login

Route::post('/login',[Login::class,'login'])->name('login');
Route::post('/register',[Register::class,'store'])->name('register');

// ResetPassword

Route::post('/resetPassword',[Login::class,'resetPassword'])->name('resetPassword');

Route::get('/resetPassword',function(){
    return view('clients.Pages.ForgotPassword.index');
})->name('resetPasswordPage');

Route::get('/tokenPage',function(){
    return view('Clients.Pages.RecoveryPassword.token');
})->name('checkTokenPage');

Route::post('/tokenPage',[Login::class,'checkToken'])->name('checkToken');

Route::get('/recoveryPassword',function(){
    return view('clients.Pages.RecoveryPassword.index');
})->name('recoveryPasswordPage');

Route::post('/recoveryPassword', [Login::class, 'recoveryPassword'])->name('recoveryPassword');



// Admin


Route::prefix('admin')->group(function () {
    Route::get('home',[AdminHomeController::class,'index'])->name('admin.home');
    Route::resource('users', AdminUserController::class)->except([
        'show'
    ]);
    Route::resource('roles', AdminRoleController::class)->except([
        'show'
    ]);
    Route::resource('permissions', AdminPermissionsController::class)->except([
        'show'
    ]);
    // Products
    Route::resource('products', AdminProductsController::class)->except(['show']);
    Route::resource('categorys', AdminCategorysController::class)->except(['show','create']);
    Route::resource('authors', AdminAuthorsController::class)->except(['show']);
    Route::resource('chapters', AdminChaptersController::class)->except(['index']);


});






