<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('adm')->group(function () {
    
    Route::resource('cidades', 'cidadeController');
    
    Route::prefix('cidade/{slug}')->group(function () {

        Route::get('/', 'cidadeController@unicaCidade');
        Route::resource('linhas', 'linhaController');
        Route::resource('pontos', 'pontoController');

    });
});
