<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');
//Route::get('register', 'HomeController@getRegister');
//Route::post('register', 'HomeController@postRegister');

Route::get('/', 'GameController@index');
Route::get('/landing', 'GameController@landing');
Route::get('/home', 'GameController@home');
Route::get('/about/{game}', 'GameController@about');
Route::get('/play/{game}', 'GameController@play');



Route::group(array('before' => 'auth'), function(){
    Route::get('admin', 'AdminController@index');
    Route::get('logout', 'HomeController@logout');


    Route::get('/admin/anti-thword/first', 'AdminAntiThwordController@first');
    Route::get('/admin/anti-thword/{id}/previous', 'AdminAntiThwordController@previous');
    Route::get('/admin/anti-thword/{id}/next', 'AdminAntiThwordController@next');
    Route::get('/admin/anti-thword/last', 'AdminAntiThwordController@last');

    Route::get('/admin/foreign-thword/first', 'AdminForeignThwordController@first');
    Route::get('/admin/foreign-thword/{id}/previous', 'AdminForeignThwordController@previous');
    Route::get('/admin/foreign-thword/{id}/next', 'AdminForeignThwordController@next');
    Route::get('/admin/foreign-thword/last', 'AdminForeignThwordController@last');

    Route::get('/admin/thword-play/first', 'AdminThwordPlayController@first');
    Route::get('/admin/thword-play/{id}/previous', 'AdminThwordPlayController@previous');
    Route::get('/admin/thword-play/{id}/next', 'AdminThwordPlayController@next');
    Route::get('/admin/thword-play/last', 'AdminThwordPlayController@last');

    Route::get('/admin/thword/first', 'AdminThwordController@first');
    Route::get('/admin/thword/{id}/previous', 'AdminThwordController@previous');
    Route::get('/admin/thword/{id}/next', 'AdminThwordController@next');
    Route::get('/admin/thword/last', 'AdminThwordController@last');

    Route::get('/admin/bandelirium/first', 'AdminBandeliriumController@first');
    Route::get('/admin/bandelirium/{id}/previous', 'AdminBandeliriumController@previous');
    Route::get('/admin/bandelirium/{id}/next', 'AdminBandeliriumController@next');
    Route::get('/admin/bandelirium/last', 'AdminBandeliriumController@last');

    Route::resource('/admin/anti-thword', 'AdminAntiThwordController');
    Route::resource('/admin/category', 'AdminCategoryController');
    Route::resource('/admin/foreign-thword', 'AdminForeignThwordController');
    Route::resource('/admin/language', 'AdminLanguageController');
    Route::resource('/admin/result', 'AdminResultController');
    Route::resource('/admin/subject', 'AdminSubjectController');
    Route::resource('/admin/thword', 'AdminThwordController');
    Route::resource('/admin/thword', 'AdminThwordController');
    Route::resource('/admin/thword-play', 'AdminThwordPlayController');
    Route::resource('/admin/bandelirium', 'AdminBandeliriumController');
    Route::resource('/admin/user', 'AdminUserController');

    Route::get('/admin/anti-thword/{id}/show', 'AdminAntiThwordController@show');
    Route::get('/admin/category/{id}/show', 'AdminCategoryController@show');
    Route::get('/admin/foreign-thword/{id}/show', 'AdminForeignThwordController@show');
    Route::get('/admin/thword/{id}/show', 'AdminThwordController@show');
    Route::get('/admin/thword-play/{id}/show', 'AdminThwordPlayController@show');
    Route::get('/admin/bandelirium/{id}/show', 'AdminBandeliriumController@show');

    Route::get('/json/anti-thword/{key}', 'AntiThwordController@json');
    Route::get('/json/bandelirum/{key}', 'BandeliriumController@json');
    Route::get('/json/foreign-thword/{key}', 'ForeignThwordController@json');
    Route::get('/json/thword/{key}', 'ThwordController@json');
    Route::get('/json/thword-play/{key}', 'ThwordPlayController@json');
    Route::get('admin/json/category-subjects/{categoryId}', 'AdminJsonController@categorySubjects');
});
