<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::controller(MenuController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/food', 'food');
    Route::get('/drinks', 'drinks');
    Route::get('/carts', 'carts');
    Route::get('/add-to-cart/{id}', 'addToCart')->name('add-to-cart');
    Route::get('/remove-from-cart/{id}', 'removeFromCart')->name('remove');
    Route::post('/order', 'order')->name('order');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index');
    Route::get('/menu', 'menu');
    Route::post('/dashboard/tambah-menu', 'tambahMenu');
});
