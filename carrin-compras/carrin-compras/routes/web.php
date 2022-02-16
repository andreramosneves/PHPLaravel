<?php

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
use App\Http\Controllers\LoginController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\KartController;

use App\Http\Controllers\OrderController;

Route::post('/LoginController', [LoginController::class, 'checkLogin']);

Route::post('/RegisterController', [LoginController::class, 'registraUsuario']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/ProductController', [ProductController::class, 'inseriProdutos']);

Route::get('/products', [ProductController::class, 'listaProdutos']);

Route::get('/getProduto/{id}', [ProductController::class, 'getProduto']);

Route::get('/finalizaProduto/{id}', [ProductController::class, 'finalizaProduto']);

Route::get('/home', [ProductController::class, 'listaProdutosHome']);

Route::post('/addItemKart', [KartController::class, 'addItemKart']);

Route::get('/kart', [KartController::class, 'listaKart']);

Route::post('/finalizarPedido', [OrderController::class, 'finalizarPedido']);

Route::get('/order', [OrderController::class, 'listaPedidos']);

Route::get('/registrar', function () {
    return view('registrar');
});


Route::get('/login', function () {
    return view('login');
});


Route::get('/teste', function () {
    return view('logout');
});


Route::get('/admin', function () {
    return view('admin');
});