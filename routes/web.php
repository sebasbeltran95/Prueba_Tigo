<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DueñosController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\RastreoController;


// post
Route::controller(PostController::class)->group(function(){
    Route::get('/','index')->name('post.ver');
    Route::get('/post','index')->name('post.ver');
    Route::post('/postinsertar', 'store')->name('post.insertar');
    Route::post('/postactualizar', 'update')->name('postactualizar');
    Route::delete('/postdestroy/{id}', 'destroy')->name('post.destroy');
    Route::post('/postfiltro','filtro_name')->name('postfiltroname');
});
// category
Route::controller(CategoryController::class)->group(function(){
    Route::get('/category','index')->name('category.ver');
    Route::post('/categoryinsertar', 'store')->name('category.insertar');
    Route::post('/categoryactualizar', 'update')->name('categoryactualizar');
    Route::delete('/categorydestroy/{id}', 'destroy')->name('category.destroy');
    Route::post('/categoryfiltro','filtro_name')->name('categoryfiltroname');
});
