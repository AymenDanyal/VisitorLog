<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\CheckInController;



Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('index', [AdminController::class, 'index'])->name('admin.index');  
        Route::get('create', [AdminController::class, 'create'])->name('admin.create'); 
        Route::post('store', [AdminController::class, 'store'])->name('admin.store');   
        Route::get('{id}', [AdminController::class, 'show'])->name('admin.show');      
        Route::get('{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');   
        Route::put('{id}', [AdminController::class, 'update'])->name('admin.update');    
        Route::delete('{id}', [AdminController::class, 'destroy'])->name('admin.destroy'); 
    });
    Route::prefix('visitors')->group(function () {
        Route::get('index', [VisitorController::class, 'index'])->name('visitors.index');  
        Route::get('create', [VisitorController::class, 'create'])->name('visitors.create'); 
        Route::post('store', [VisitorController::class, 'store'])->name('visitors.store');   
        Route::get('{id}', [VisitorController::class, 'show'])->name('visitors.show');      
        Route::get('{id}/edit', [VisitorController::class, 'edit'])->name('visitors.edit');   
        Route::put('{id}', [VisitorController::class, 'update'])->name('visitors.update');    
        Route::delete('{id}', [VisitorController::class, 'destroy'])->name('visitors.destroy'); 
    });
    Route::prefix('check-ins')->group(function () {
        Route::get('index', [CheckInController::class, 'index'])->name('check-ins.index');  
        Route::get('create', [CheckInController::class, 'create'])->name('check-ins.create'); 
        Route::post('store', [CheckInController::class, 'store'])->name('check-ins.store');   
        Route::get('{id}', [CheckInController::class, 'show'])->name('check-ins.show');      
        Route::get('{id}/edit', [CheckInController::class, 'edit'])->name('check-ins.edit');   
        Route::put('{id}', [CheckInController::class, 'update'])->name('check-ins.update');    
        Route::delete('{id}', [CheckInController::class, 'destroy'])->name('check-ins.destroy'); 
    });




    Route::prefix('users')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('users.index');  
        Route::get('create', [UserController::class, 'create'])->name('users.create'); 
        Route::post('store', [UserController::class, 'store'])->name('users.store');   
        Route::get('{id}', [UserController::class, 'show'])->name('users.show');      
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');   
        Route::put('{id}', [UserController::class, 'update'])->name('users.update');    
        Route::delete('{id}', [UserController::class, 'destroy'])->name('users.destroy'); 
    });
    Route::prefix('roles')->group(function () {
        Route::get('index', [RoleController::class, 'index'])->name('roles.index');  
        Route::get('create', [RoleController::class, 'create'])->name('roles.create'); 
        Route::post('store', [RoleController::class, 'store'])->name('roles.store');   
        Route::get('{id}', [RoleController::class, 'show'])->name('roles.show');      
        Route::get('{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');   
        Route::put('{id}', [RoleController::class, 'update'])->name('roles.update');    
        Route::delete('{id}', [RoleController::class, 'destroy'])->name('roles.destroy'); 
    });
    Route::prefix('departments')->group(function () {
        Route::get('index', [DepartmentController::class, 'index'])->name('departments.index');  
        Route::get('create', [DepartmentController::class, 'create'])->name('departments.create'); 
        Route::post('store', [DepartmentController::class, 'store'])->name('departments.store');   
        Route::get('{id}', [DepartmentController::class, 'show'])->name('departments.show');      
        Route::get('{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');   
        Route::put('{id}', [DepartmentController::class, 'update'])->name('departments.update');    
        Route::delete('{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy'); 
    });
    Route::prefix('purposes')->group(function () {
        Route::get('index', [PurposeController::class, 'index'])->name('purposes.index');  
        Route::get('create', [PurposeController::class, 'create'])->name('purposes.create'); 
        Route::post('store', [PurposeController::class, 'store'])->name('purposes.store');   
        Route::get('{id}', [PurposeController::class, 'show'])->name('purposes.show');      
        Route::get('{id}/edit', [PurposeController::class, 'edit'])->name('purposes.edit');   
        Route::put('{id}', [PurposeController::class, 'update'])->name('purposes.update');    
        Route::delete('{id}', [PurposeController::class, 'destroy'])->name('purposes.destroy'); 
    });
    Route::prefix('permissions')->group(function () {
        Route::get('index', [PermissionsController::class, 'index'])->name('permissions.index');  
        Route::get('create', [PermissionsController::class, 'create'])->name('permissions.create'); 
        Route::post('store', [PermissionsController::class, 'store'])->name('permissions.store');   
        Route::get('{id}', [PermissionsController::class, 'show'])->name('permissions.show');      
        Route::get('{id}/edit', [PermissionsController::class, 'edit'])->name('permissions.edit');   
        Route::put('{id}', [PermissionsController::class, 'update'])->name('permissions.update');    
        Route::delete('{id}', [PermissionsController::class, 'destroy'])->name('permissions.destroy'); 
    });

    // Define the dashboard route with the name
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

    // Route to handle login submission
    Route::post('/loginSubmit', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/', function () {
        return view('index');
    });

});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


