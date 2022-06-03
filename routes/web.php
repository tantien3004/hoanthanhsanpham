<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () 
// {
//     Route::get('/dashboard', function () 
//     {
//         return view('dashboard');
//     })->name('dashboard');
// });


//for user
Route::middleware(['auth:sanctum', 'verified'])->group(function()
{
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

//for admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function()
{
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});