<?php

use Illuminate\Http\Request;

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


Route::group(["namespace"=>"Api",'prefix' => 'json'],function() {
    Route::get('/visitors/unique/{offset}/{limit}','VisitorController@uniqueVisitorsJson');
    Route::get('/hits/{offset}/{limit}','HitController@getHits');
    Route::get('/hits/top/{offset}/{limit}','HitController@getHitsInDescOrder');
});


