<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Livewire\Counter;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),
    'verified']
)->get('/dashboard',[App\Http\Controllers\Controller::class,'sort']
)->name('dashboard');

Route::middleware(['auth:sanctum',
        config('jetstream.auth_session'),
        'verified']
)->post('/dashboard',[App\Http\Controllers\Controller::class,'sort']
)->name('dashboard');

//タスクフォームの送信
Route::middleware(['auth:sanctum', 'verified']
)->post('/create',[Controller::class,'create']
)->name('create');

Route::middleware(['auth:sanctum', 'verified']
)->delete('/destroy',[Controller::class,'destroy']
)->name('destroy');

Route::middleware(['auth:sanctum', 'verified']
)->post('/search',[Controller::class,'search']
)->name('search');

Route::middleware(['auth:sanctum', 'verified']
)->get('/modaltest',[Controller::class,'modaltest']
)->name('modaltest');
