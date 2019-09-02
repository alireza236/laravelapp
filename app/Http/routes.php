<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    Route::get('/', 'PagesController@homepage');

    Route::get('about', 'PagesController@homepage');



    
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    Route::get('siswa', 'SiswaController@index');
        
    Route::get('register', function(){
        return redirect('/'); 
    });

    Route::get('siswa/cari',['uses'=>'SiswaController@cari', 'as'=> 'carisiswa']);
    
    Route::get('siswa/create', 'SiswaController@create');

    Route::post('siswa', 'SiswaController@store');
    
    Route::get('siswa/{siswa}', 'SiswaController@show');

    Route::get('siswa/{siswa}/edit', 'SiswaController@edit');

    Route::patch('siswa/{siswa}', 'SiswaController@update');

    Route::delete('siswa/{siswa}', 'SiswaController@destroy');

    
    Route::get('user', 'UserController@index');

    Route::get('user/create', 'UserController@create');

    Route::post('user', 'UserController@store');
    
    Route::get('user/{user}', 'UserController@show');

    Route::get('user/{user}/edit', 'UserController@edit');

    Route::patch('user/{user}', 'UserController@update');

    Route::delete('user/{user}', 'UserController@destroy');
 
    Route::get('matkul', 'MataKuliahController@index');
    
    Route::get('dosen', 'DosenController@index');
    
    
    
    
   

    //Route::resource('user','UserController');

    Route::resource('kelas','KelasController');
    
    Route::resource('hobi','HobiController');




//Route::get('tes-koleksi', 'SiswaController@testKoleksi');

//Route::get('date-mutator/{id}', 'SiswaController@dateMutator');



