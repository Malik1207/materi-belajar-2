<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Permissions\{RoleController, AssignController, PermissionController, UserController,};
use Spatie\Permission\Models\Role;

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

Route::get('/', function () {
    // $role = Role::whereName('admin')->first();
    // dd($role->givePermissionTo('create category'));
    // $hasRole = auth()->user()->hasAnyRole($roles);
    // dd($hasRole);
    return view('welcome');
    // $roles = Role::find('2');
    // $role->givePermissionTo('create post', 'delete post');
    // dd($role);
});

Route::middleware('has.role')->group(function() {
    
    Route::view('dashboard', 'dashboard')->name('dashboard'); 
    Route::middleware('permission:create post')->group(function () {
        Route::view('posts/create', 'posts.create');
        Route::view('posts/table', 'posts.table');
        Route::view('categories/create', 'categories.create');
        Route::view('categories/table', 'categories.table');
    });

    Route::prefix('role-and-permission')->namespace('Permissions')->middleware('permission:assign permission')->group(function() {
        Route::get('assignable', [AssignController::class, 'create'])->name('assign.create');
        Route::post('assignable', [AssignController::class, 'store']);
        Route::get('assignable/{role}/edit', [AssignController::class, 'edit'])->name('assign.edit');
        Route::put('assignable/{edit}/edit', [AssignController::class, 'update']);
        Route::put('assignable/{edit}/edit', [AssignController::class, 'update']);

        // User
        Route::get('assign/user', [UserController::class, 'create'])->name('assign.user.create');
        Route::post('assign/user', [UserController::class, 'store']);
        Route::get('assign/{user}user', [UserController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign/{user}user', [UserController::class, 'update']);
        
        Route::prefix('roles')->group(function () {
            Route::get('', [RoleController::class, 'index'])->name('roles.index');
            Route::post('create', [RoleController::class, 'store'])->name('roles.create');
            Route::get('{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('{role}/edit', [RoleController::class, 'update']);
        });
        Route::prefix('permissions')->group(function () {
            Route::get('', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('create', [PermissionController::class, 'store'])->name('permissions.create');
            Route::get('{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('{permission}/edit', [PermissionController::class, 'update']);
        });
    });

    Route::prefix('navigation')->middleware('permission: create navigation')->group(function () {
        Route::get('create', [NavigationController::class, 'create'])->name('navigation.create');
        Route::post('create', [NavigationController::class, 'store']);
        Route::get('table', [NavigationController::class, 'table'])->name('navigation.table');
        Route::get('{navigation}/edit', [NavigationController::class, 'edit'])->name('navigation.edit');
        Route::put('{navigation}/edit', [NavigationController::class, 'update']);
        Route::delete('{navigation}/delete', [NavigationController::class, 'destroy'])->name('navigation.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
