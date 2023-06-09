<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('tracks')->group(function(){

    Route::get('/',function(){
        return "list of tracks pages";
    })->name('tracks.index');

    Route::get('/{id}/{name?}',function($id,$name=''){

        return 'Details page of tracks '.$id.' named '.$name ;
        
    })->name('track.etails');

    Route::get('/create',function(){})->name('tracks.create');

    Route::Post("/",function(){})->name('tracks.store');

    Route::get('/{id}/edit',function($id){

        return 'this is edit form of tracks'. $id ;

    })->name('tracks.edit');

    Route::put('/{id}',function($id){})->name('tracks.update');

    Route::delete('/{id}',function($id){})->name('tracks.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
