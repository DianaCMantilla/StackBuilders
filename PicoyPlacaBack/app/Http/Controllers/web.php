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

Route::get('/laboratorio/nt', function () {
    return view('mivista');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu',function(){
	return view('lista');
});


Route::get('/lista/cambiar','estudiantesDP@cambiar');



/*Route::get('/lista/{nivel_url}',function($nivel){

	
	//return view('lista',['nivel'=>$nivel]);
	

});//entre llaves, parámetro
*/