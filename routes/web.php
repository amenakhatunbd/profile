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
//     return view('welcome');
// });

Route::prefix('admin')->group(function(){

    Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');
    
    Route::get('/main', 'MainPageController@index')->name('main');
    Route::put('/main', 'MainPageController@update')->name('admin.main.update');
    
    Route::get('/service/create', 'servicePageController@create')->name('admin.service.create');
    Route::post('/service/create', 'servicePageController@store')->name('admin.service.store');
    Route::get('/service/list', 'servicePageController@list')->name('admin.service.list');
    Route::get('/service/edit/{id}', 'servicePageController@edit')->name('admin.service.edit');
    Route::post('/service/update/{id}', 'servicePageController@update')->name('admin.service.update');
    Route::delete('/service/destroy/{id}', 'servicePageController@destroy')->name('admin.service.destroy');

    
    Route::get('/portfolio/create', 'PortfolioPageController@create')->name('admin.portfolio.create');
    Route::put('/portfolio/create', 'PortfolioPageController@store')->name('admin.portfolio.store');
    Route::get('/portfolio/list', 'PortfolioPageController@list')->name('admin.portfolio.list');
    Route::get('/portfolio/edit/{id}', 'PortfolioPageController@edit')->name('admin.portfolio.edit');
    Route::post('/portfolio/update/{id}', 'PortfolioPageController@update')->name('admin.portfolio.update');
    Route::delete('/portfolio/destroy/{id}', 'PortfolioPageController@destroy')->name('admin.portfolio.destroy');


    Route::get('/about/create', 'AboutPageController@create')->name('admin.about.create');
    Route::put('/about/create', 'AboutPageController@store')->name('admin.about.store');
    Route::get('/about/list', 'AboutPageController@list')->name('admin.about.list');
    Route::get('/about/edit/{id}', 'AboutPageController@edit')->name('admin.about.edit');
    Route::post('/about/update/{id}', 'AboutPageController@update')->name('admin.about.update');
    Route::delete('/about/destroy/{id}', 'AboutPageController@destroy')->name('admin.about.destroy');


    Route::get('/team/create', 'TeamPageController@create')->name('admin.team.create');
    Route::put('/team/create', 'TeamPageController@store')->name('admin.team.store');
    Route::get('/team/list', 'TeamPageController@list')->name('admin.team.list');
    Route::get('/team/edit/{id}', 'TeamPageController@edit')->name('admin.team.edit');
    Route::post('/team/update/{id}', 'TeamPageController@update')->name('admin.team.update');
    Route::delete('/team/destroy/{id}', 'TeamPageController@destroy')->name('admin.team.destroy');
    
    
    Route::get('/portfolio', 'PageController@portfolio')->name('portfolio');
    
});
Route::get('/', 'PageController@index')->name('home');
Route::post('/contact', 'ContactController@store')->name('contact.store');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
