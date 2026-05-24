<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;


//Listar
Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');

//Incluir
Route::get('categorias/incluir', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('categorias/incluir', [CategoriaController::class, 'store'])->name('categorias.store');

//Atualizar
Route::get('categorias/editar/{categoria}', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::patch('categorias/editar/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');

//Deletar
Route::get('categorias/excluir/{categoria}', [CategoriaController::class, 'delete'])->name('categorias.delete');
