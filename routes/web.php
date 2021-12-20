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

// Route::get('/', function () {
//     return view('pages');
// });

Route::get('/home', function () {
    return view('layout');
});

Route::get('/', 'Pagescontroller@index');

Route::get('/posts/{post}', 'Pagescontroller@vpost');

Route::post('/posts/store', 'Pagescontroller@store');
// To add Comment 
Route::post('/posts/{post}/store', 'Commetcontroller@store');

Route::get('/category/{name}', 'Pagescontroller@category');
//Auth 
Route::get('/register', 'Registercontroller@create');

Route::post('/register', 'Registercontroller@store');

Route::get('/login', 'Sessioncontroller@create');
Route::post('/login', 'Sessioncontroller@store');

Route::get('/logout', 'Sessioncontroller@destroy');


Route::group(['middleware'=>'roles','roles'=>['Admin']],function(){

Route::get('/admin', 'Pagescontroller@admin');
Route::post('/add_role', 'Pagescontroller@add_role');
Route::post('/settings', 'Pagescontroller@settings');

});
// Route::get('/admin', [
//     'uses'=>'Pagescontroller@admin',
//     'as'=>'content.admin',
//     'middleware'=>'roles',
//     'roles'=>['Admin']
// ]);

// Route::post('/add_role', [
//     'uses'=>'Pagescontroller@add_role',
//     'as'=>'content.admin',
//     'middleware'=>'roles',
//     'roles'=>['Admin']
// ]);

Route::get('/accessdeny', 'Pagescontroller@deniy');

Route::get('/Statistics', 'Pagescontroller@Statistics');



Route::group(['middleware'=>'roles','roles'=>['Admin','Editor']],function(){

    Route::get('/editor','Pagescontroller@editor');
    Route::post('/posts/store', 'Pagescontroller@store');

});

// Route::get('/editor', [
//     'uses'=>'Pagescontroller@editor',
//     'as'=>'content.editor',
//     'middleware'=>'roles',
//     'roles'=>['Admin','editor']
// ]);
Route::group(['middleware'=>'roles','roles'=>['Admin','Editor','user']],function(){
   
    Route::post('/like', 'Pagescontroller@like')->name('like');
    Route::post('/dislike', 'Pagescontroller@dislike')->name('dislike');


});
