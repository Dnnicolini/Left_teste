<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaProdutoController;
use App\Http\Controllers\ClienteController;

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

//Rotas Produtos
Route::get('/produtos',[ProdutoController::class, 'index']);
Route::get('/produtos/create',[ProdutoController::class, 'create'])->name("produtos.create");
Route::post('/produtos/store',[ProdutoController::class, 'store'])->name("produtos.store");
Route::get('/produtos/edit/{id}',[ProdutoController::class, 'edit'])->name("produtos.edit");
Route::post('/produtos/update/{id}',[ProdutoController::class, 'update'])->name("produtos.update");
Route::delete('/produtos/destroy/{id}',[ProdutoController::class,'destroy'])->name("produtos.delete");


//Rotas Clientes
Route::get('/clientes',[ClienteController::class, 'index']);
Route::get('/clientes/create',[ClienteController::class, 'create'])->name("clientes.create");
Route::post('/clientes/store',[ClienteController::class, 'store'])->name("clientes.store");
Route::get('/clientes/edit/{id}',[ClienteController::class, 'edit'])->name("clientes.edit");
Route::post('/clientes/update/{id}',[ClienteController::class, 'update'])->name("clientes.update");
Route::get('/clientes/show/{id}',[ClienteController::class, 'show'])->name("clientes.show");
Route::delete('/clientes/destroy/{id}',[ClienteController::class,'destroy'])->name("clientes.delete");
Route::get('/clientes/endcreate/{id}',[ClienteController::class, 'endcreate'])->name("clientes.endCreate");
Route::post('/clientes/endstore/{id}',[ClienteController::class, 'endstore'])->name("clientes.endstore");
Route::get('/clientes/endedit/{id}',[ClienteController::class, 'endedit'])->name("clientes.endedit");
Route::post('/clientes/endupdate/{id}',[ClienteController::class, 'endupdate'])->name("clientes.endupdate");
Route::delete('/clientes/enddestroy/{id}',[ClienteController::class,'enddestroy'])->name("clientes.enddelete");

//Rotas Categorias
Route::get('/categorias',[CategoriaProdutoController::class, 'index']);
Route::get('/categorias/create',[CategoriaProdutoController::class, 'create'])->name("categorias.create");
Route::post('/categorias/store',[CategoriaProdutoController::class, 'store'])->name("categorias.store");
Route::get('/categorias/edit/{id}',[CategoriaProdutoController::class, 'edit'])->name("categorias.edit");
Route::post('/categorias/update/{id}',[CategoriaProdutoController::class, 'update'])->name("categorias.update");
Route::delete('/categorias/destroy/{id}',[CategoriaProdutoController::class,'destroy'])->name("categorias.delete");
