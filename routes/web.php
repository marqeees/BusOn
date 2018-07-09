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
        Route::resource('horarios', 'horarioController');
    });

    Route::delete('/dlinhas/{id}', 'linhaController@destroy')->name('dlinhas');
    Route::post('/elinhas/{id}', 'linhaController@update')->name('elinhas');
    Route::delete('/dpontos/{id}', 'pontoController@destroy')->name('dpontos');
    Route::post('/epontos/{id}', 'pontoController@update')->name('epontos');
    Route::delete('/dhorarios/{id}', 'horarioController@destroy')->name('dhorario');
    Route::post('/ehorarios/{id}', 'horarioController@update')->name('ehorario');

});
