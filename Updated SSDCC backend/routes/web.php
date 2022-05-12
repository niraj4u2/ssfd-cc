<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
* 
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//~ Route::get('/', function () {
    //~ return redirect('/login');
//~ });
//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group(['middleware' => ['auth']], function () { 
	Route::get('/', function () {
		return redirect('/login');
		// return view('login');
}); 
	 Route::get('/dashboard', 'Dashboard@index')->name('dashboard');
    Route::get('/user/admin', 'User@admin')->name('admin');
    
    Route::get('/user/add' , 'User@add');
	Route::get('/user/edit/{id}' , 'User@edit');
    Route::post('/user/save/' , 'User@save')->name('user.save');; 
   
    Route::get('/user/delete/{id}' , 'User@delete');

	
       Route::get('/home', 'Dashboard@index')->name('home');  
	Route::post('/deleteall' , 'Dashboard@deleteall')->name('deleteall');
	Route::post('/blockall' , 'Dashboard@blockall')->name('blockall');
	Route::post('/unblockall' , 'Dashboard@unblockall')->name('unblockall');
	Route::post('/clearall' , 'Dashboard@clearall')->name('clearall');
	
	Route::get('/home/delete/{id}' , 'Dashboard@delete');

 
});
 



