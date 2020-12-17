<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// \DB::listen(function($sql) {
//     \Log::info($sql->sql);
// });

/** Send Email route */
Route::post('/email','Api\EmailApiController@build');

/** Types routes */
Route::get('/types','Api\TypeApiController@index');
Route::get('/types/{type_id}','Api\TypeApiController@show');

/** Tag routes */
Route::get('/categories', 'Api\TagApiController@index'); // top level tags are 'categories' 
Route::get('/categories/{tag_id}', 'Api\TagApiController@show');

/** Demographic routes */
Route::get('/demographics', 'Api\DemographicApiController@index');
Route::get('/demographics/{demographic_id}', 'Api\DemographicApiController@show');

/** New Subscriber route */
Route::post('/subscribe', 'Api\SubscriberApiController@store');

/** Verify Email route */
Route::post('/verify/{email}','Api\SubscriberApiController@verify');

/** Update subscription */
Route::put('/subscription', 'Api\SubscriberApiController@update');





// /** Subscriber routes */
// Route::post('/subscribers', 'Api\SubscriberApiController@store'); 
// Route::put('/subscribers/{subscriber}', 'Api\SubscriberApiController@update');

// /** SubscriberDistribution routes */
// Route::post('/subscribers/{subscriber}/distributions', 'Api\SubscriberDistributionApiController@store');
// Route::get('/subscribers/{subscriber}/distributions', 'Api\SubscriberDistributionApiController@index');

// /** Distribution routes*/
// Route::get('/distributions', 'Api\DistributionApiController@index');
// Route::delete('distributions/{distribution}', 'Api\DistributionApiController@delete');
// Route::put('distributions/{distribution}', 'Api\DistributionApiController@update');
// Route::get('/distributions/{distribution}', 'Api\DistributionApiController@show');

// /** DistributionTag routes */
// Route::post('/distributions/{distribution}/tags', 'Api\DistributionTagApiController@store');//add tags
// Route::delete('/distributions/{distribution}/tags/{tag}', 'Api\DistributionTagApiController@delete');//delete tags

?>
