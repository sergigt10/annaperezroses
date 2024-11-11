<?php

use Illuminate\Support\Facades\Route;

// FrontEnd //

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        /* Inici */
        Route::get('/', 'HomeFrontendController@index')->name('frontend.inici.index');
        /* Biografia */
        Route::get('/biografia', 'HomeFrontendController@biografia')->name('frontend.biografia.index');
        /* Pintura */
        Route::get('/pintura', 'HomeFrontendController@pintures')->name('frontend.pintures.index');
        /* Ceràmica */
        Route::get('/ceramica', 'HomeFrontendController@ceramiques')->name('frontend.ceramiques.index');
        /* Il·lustració */
        Route::get('/ilustracio', 'HomeFrontendController@ilustracions')->name('frontend.ilustracions.index');
        /* Contacte */
        Route::get('/contacte', 'HomeFrontendController@contacte')->name('frontend.contacte.index');
        Route::post('/contacte/enviar', 'HomeFrontendController@sendEmail')->name('frontend.sendMail');
});

        /* Sitemap */
        Route::get('/sitemap.xml', 'SitemapController@index');
        Route::get('/sitemap.xml/statics', 'SitemapController@statics');

// BackEnd //

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::group(['middleware' => ['auth']], function() {
    /* Inici */
    Route::get('backend/inici', 'HomeBackendController@index')->name('backend.inici.index');
    /* Portada */
    Route::get('backend/portades', 'PortadesController@index')->name('backend.portades.index');
    Route::get('backend/portades/create', 'PortadesController@create')->name('backend.portades.create');
    Route::post('backend/portades', 'PortadesController@store')->name('backend.portades.store');
    Route::get('backend/portades/{portada}/edit', 'PortadesController@edit')->name('backend.portades.edit');
    Route::put('backend/portades/{portada}', 'PortadesController@update')->name('backend.portades.update');
    Route::delete('backend/portades/{portada}', 'PortadesController@destroy')->name('backend.portades.destroy');
    /* Obres */
    Route::get('backend/obres/showCategories', 'ObresController@show')->name('backend.obres.show');
    Route::get('backend/obres/show/{categoria}', 'ObresController@index')->name('backend.obres.index');
    Route::get('backend/obres/create', 'ObresController@create')->name('backend.obres.create');
    Route::post('backend/obres', 'ObresController@store')->name('backend.obres.store');
    Route::get('backend/obres/{obra}/edit', 'ObresController@edit')->name('backend.obres.edit');
    Route::put('backend/obres/{obra}', 'ObresController@update')->name('backend.obres.update');
    Route::delete('backend/obres/{obra}', 'ObresController@destroy')->name('backend.obres.destroy');
});