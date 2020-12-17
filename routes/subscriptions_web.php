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

    return 'Hello, Friend!';

});

// Tag routes 
Route::get('/tag','TagController@index')->name('all_tags');
Route::get('/tag/create','TagController@create')->name('tag_create');
Route::get('/tag/{tag}','TagController@show')->name('tag_show');
Route::post('/tag/store','TagController@store')->name('tag_store');
Route::put('/tag/{tag}', 'TagController@update')->name('tag_update');
Route::get('/tag/{tag}/edit', 'TagController@edit')->name('tag_edit');
//Route::delete('/tag/{tag}', 'TagController@destroy')->name('tag_delete');
Route::get('/tag/{tag}', 'TagController@destroy')->name('tag_delete');

// Category routes 
Route::get('/category','TagController@index_cat')->name('all_categories');
Route::get('/category/create','TagController@create_cat')->name('category_create');
Route::get('/category/{category}/show','TagController@show_cat')->name('category_show');
Route::post('/category/store','TagController@store_cat')->name('category_store');
Route::put('/category/{category}', 'TagController@update')->name('category_update');
Route::get('/category/{category}/edit', 'TagController@edit_cat')->name('category_edit');
//Route::delete('/category/{category}', 'TagController@destroy')->name('category_delete');
Route::get('/category/{category}', 'TagController@destroy')->name('category_delete');

// Type routes
Route::get('/type','TypeController@index')->name('all_types');
Route::get('/type/create','TypeController@create')->name('type_create');
Route::get('/type/{type}/show','TypeController@show')->name('type_show'); 
Route::post('/type/store','TypeController@store')->name('type_store');
Route::put('/type/{type}', 'TypeController@update')->name('type_update');
Route::get('/type/{type}/edit', 'TypeController@edit')->name('type_edit');
//Route::delete('/type/{type}', 'TypeController@destroy')->name('type_delete');
Route::get('/type/{type}', 'TypeController@destroy')->name('type_delete');

// Demographic routes
Route::get('/demographic','DemographicController@index')->name('all_demographics');
Route::get('/demographic/create','DemographicController@create')->name('demographic_create');
Route::get('/demographic/{demographic}/show','DemographicController@show')->name('demographic_show'); 
Route::post('/demographic/store','DemographicController@store')->name('demographic_store');
Route::put('/demographic/{demographic}', 'DemographicController@update')->name('demographic_update');
Route::get('/demographic/{demographic}/edit', 'DemographicController@edit')->name('demographic_edit');
//Route::delete('/demographic/{demographic}', 'DemographicController@destroy')->name('demographic_delete');
Route::get('/demographic/{demographic}', 'DemographicController@destroy')->name('demographic_delete');

// Application routes
Route::get('/application', 'ApplicationController@index')->name('all_applications');
Route::get('/application/create', 'ApplicationController@create')->name('application_create');
Route::get('/application/{application}/show','ApplicationController@show')->name('application_show'); 
Route::post('/application', 'ApplicationController@store')->name('application_store');
Route::put('/application/{application}', 'ApplicationController@update')->name('application_update');
Route::get('application/{application}/edit', 'ApplicationController@edit')->name('application_edit');
//Route::delete('/application/{application}', 'ApplicationController@destroy')->name('application_delete');
Route::get('/application/{application}', 'ApplicationController@destroy')->name('application_delete');

// Admin Panel
Route::get('/admin/panel', 'PanelController@show')->name('admin_panel');



Route::get('/admin/dashboard/{application}', 'DashboardController@show');
Route::get('/subscriber/new', 'DistributionController@create')->name('distribution_create');
Route::get('/subscriber/{subscriber}/edit', 'DistributionController@create')->name('distribution_edit');
Route::post('/subscriber/store', 'DistributionController@store')->name('distribution_store');



?>
