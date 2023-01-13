<?php

use App\Http\Livewire\Auth\Index as authIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Task\Base as TaskBase;
use App\Http\Livewire\product\create as ProductCreate;

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
    return view('index');
});

Route::get('/login', authIndex::class)->name('login');
Route::post('/logout',function(){
    auth()->logout();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::get('/tasks',TaskBase::class)->name('tasks');
Route::get('products/create',ProductCreate::class)->name('product.create');
