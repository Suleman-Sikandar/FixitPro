<?php

use App\Http\Controllers\Admin\Auth\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
    });
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['XSS', 'Admin'])->group(function () {
      
        
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Admin User Management (ACL)
        Route::get('acl/users', [\App\Http\Controllers\Admin\Admin_user\Controllers\AdminUserController::class, 'index'])->name('acl.users');
        Route::get('acl/users/edit/{id}', [\App\Http\Controllers\Admin\Admin_user\Controllers\AdminUserController::class, 'edit'])->name('acl.users.edit');
        Route::post('acl/users/edit/{id}', [\App\Http\Controllers\Admin\Admin_user\Controllers\AdminUserController::class, 'update'])->name('acl.users.update');
        Route::get('acl/users/add', [\App\Http\Controllers\Admin\Admin_user\Controllers\AdminUserController::class, 'create'])->name('acl.users.add');
        Route::post('acl/users/add', [\App\Http\Controllers\Admin\Admin_user\Controllers\AdminUserController::class, 'store'])->name('acl.users.store');
        Route::get('acl/users/delete/{id}', [\App\Http\Controllers\Admin\Admin_user\Controllers\AdminUserController::class, 'destroy'])->name('acl.users.delete');

        // Roles Management
        Route::get('acl/roles', [\App\Http\Controllers\Admin\Acl\Controllers\RoleController::class, 'index'])->name('acl.roles');
        Route::get('acl/roles/add', [\App\Http\Controllers\Admin\Acl\Controllers\RoleController::class, 'create'])->name('acl.roles.add');
        Route::post('acl/roles/add', [\App\Http\Controllers\Admin\Acl\Controllers\RoleController::class, 'store'])->name('acl.roles.store');
        Route::get('acl/roles/edit/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\RoleController::class, 'edit'])->name('acl.roles.edit');
        Route::post('acl/roles/edit/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\RoleController::class, 'update'])->name('acl.roles.update');
        Route::get('acl/roles/delete/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\RoleController::class, 'destroy'])->name('acl.roles.delete');
        
        // Modules Management
        Route::get('acl/modules', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleController::class, 'index'])->name('acl.modules');
        Route::get('acl/modules/add', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleController::class, 'create'])->name('acl.modules.add');
        Route::post('acl/modules/add', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleController::class, 'store'])->name('acl.modules.store');
        Route::get('acl/modules/edit/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleController::class, 'edit'])->name('acl.modules.edit');
        Route::post('acl/modules/edit/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleController::class, 'update'])->name('acl.modules.update');
        Route::get('acl/modules/delete/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleController::class, 'destroy'])->name('acl.modules.delete');
        
        // Categories Management
        Route::get('acl/categories', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleCategoryController::class, 'index'])->name('acl.categories');
        Route::get('acl/categories/add', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleCategoryController::class, 'create'])->name('acl.categories.add');
        Route::post('acl/categories/add', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleCategoryController::class, 'store'])->name('acl.categories.store');
        Route::get('acl/categories/edit/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleCategoryController::class, 'edit'])->name('acl.categories.edit');
        Route::post('acl/categories/edit/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleCategoryController::class, 'update'])->name('acl.categories.update');
        Route::get('acl/categories/delete/{id}', [\App\Http\Controllers\Admin\Acl\Controllers\ModuleCategoryController::class, 'destroy'])->name('acl.categories.delete');
    });
});
