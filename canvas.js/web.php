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
Route::view('/error', '/error');

// Admin
Route::get('/logout','PanelController@logout')->name('logout');
Route::get('/admin/panel', 'PanelController@show')->name('admin_panel');
Route::get('/admin/dashboard/{application}', 'DashboardController@show');
// Dashboard Chart View
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/dashboard/application/{application}', 'DashboardController@show_app');

// Tag routes 
Route::post('/tag/filter', 'TagController@fetchResults')->name('tag.filter'); // Needs to be before general routes
Route::get('/tag','TagController@index')->name('all_tags');
Route::get('/tag/{category}/create','TagController@create')->name('tag_create');
Route::get('/tag/{tag}','TagController@show')->name('tag_show');
Route::post('/tag/store','TagController@store')->name('tag_store');
Route::put('/tag/{tag}', 'TagController@update')->name('tag_update');
Route::get('/tag/{tag}/edit', 'TagController@edit')->name('tag_edit');
Route::get('/tag/{tag}', 'TagController@destroy')->name('tag_delete');

// Category routes 
Route::post('/category/{application}/filter', 'TagController@fetchResults_cat')->name('category.filter'); // Needs to be before general routes
Route::get('/category','TagController@index_cat')->name('all_categories');
Route::get('/category/create','TagController@create_cat')->name('category_create');
Route::get('/category/{category}/show','TagController@show_cat')->name('category_show');
Route::post('/category/store','TagController@store_cat')->name('category_store');
Route::put('/category/{category}', 'TagController@update_cat')->name('category_update');
Route::get('/category/{category}/edit', 'TagController@edit_cat')->name('category_edit');
Route::get('/category/{category}', 'TagController@destroy_cat')->name('category_delete');
Route::get('/category/application/{application}', 'TagController@show_app')->name('category_show_app');

// Type routes
Route::post('/type/filter', 'TypeController@fetchResults')->name('type.filter'); // Needs to be before general routes
Route::get('/type','TypeController@index')->name('all_types');
Route::get('/type/create','TypeController@create')->name('type_create');
Route::get('/type/{type}/create','TypeController@create_tag')->name('subtype_create');
Route::get('/type/{type}/show','TypeController@show')->name('type_show'); 
Route::post('/type/store','TypeController@store')->name('type_store');
Route::put('/type/{type}', 'TypeController@update')->name('type_update');
Route::get('/type/{type}/edit', 'TypeController@edit')->name('type_edit');
Route::get('/type/{type}', 'TypeController@destroy')->name('type_delete');

// Demographic routes
Route::post('/demographic/filter', 'DemographicController@fetchResults')->name('demographic.filter'); // Needs to be before general routes
Route::get('/demographic','DemographicController@index')->name('all_demographics');
Route::get('/demographic/create','DemographicController@create')->name('demographic_create');
Route::get('/demographic/{demographic}/create','DemographicController@create_tag')->name('subdemographic_create');
Route::get('/demographic/{demographic}/show','DemographicController@show')->name('demographic_show'); 
Route::post('/demographic/store','DemographicController@store')->name('demographic_store');
Route::put('/demographic/{demographic}', 'DemographicController@update')->name('demographic_update');
Route::get('/demographic/{demographic}/edit', 'DemographicController@edit')->name('demographic_edit');
//Route::delete('/demographic/{demographic}', 'DemographicController@destroy')->name('demographic_delete');
Route::get('/demographic/{demographic}', 'DemographicController@destroy')->name('demographic_delete');

// Application routes
Route::post('/application/filter', 'ApplicationController@fetchResults')->name('application.filter'); // Needs to be before general routes
Route::get('/application', 'ApplicationController@index')->name('all_applications');
Route::get('/application/create', 'ApplicationController@create')->name('application_create');
Route::get('/application/{application}/show','ApplicationController@show')->name('application_show'); 
Route::post('/application', 'ApplicationController@store')->name('application_store');
Route::put('/application/{application}', 'ApplicationController@update')->name('application_update');
Route::get('application/{application}/edit', 'ApplicationController@edit')->name('application_edit');
Route::get('/application/{application}', 'ApplicationController@destroy')->name('application_delete');
Route::get('/application/{application}/subscribers', 'SubscriberController@index')->name('application_subscribers');

// Subscriber routes
Route::post('/subscriber/filter', 'SubscriberController@fetchResults')->name('subscriber.filter'); // Needs to be before general routes
Route::get('/subscriber/{subscriber_id}', 'SubscriberController@show');
Route::get('/subscriber/application/{application}', 'SubscriberController@index');
Route::get('/subscriber', 'SubscriberController@index')->name('all_subscribers');


//Template routes
Route::post('/templates/filter', 'TemplateController@fetchResults')->name('template.filter');
Route::get('/templates/create', 'TemplateController@create')->name('template_create');
Route::get('/templates', 'TemplateController@index')->name('all_templates');
Route::post('/templates', 'TemplateController@store')->name('template_store');
Route::get('/templates/{template}/edit', 'TemplateController@edit')->name('template_edit');
Route::put('/templates/{template}', 'TemplateController@update')->name('template_update');
Route::get('/templates/{template}', 'TemplateController@destroy')->name('template_delete');

Route::get('/send', 'SendReleaseController@sendMail')->name('send');
