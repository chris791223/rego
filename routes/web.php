<?php

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
    return view('welcome');
});



/*
Route::get('/admin', function(){
    return view('admin.index');
});
*/
/*
Route::group(['middleware'=>'admin'], function(){
    Route::resource('/admin', 'AdminController');

    Route::resource('/admin/restaurants', 'AdminRestaurantsController');

    Route::resource('/admin/restaurant/tables', 'AdminRestaurantTablesController');

    Route::post('/admin/restaurant/tables/add_all', 'AdminRestaurantTablesController@insertAll');
    Route::post('/admin/restaurant/tables/edit_all', 'AdminRestaurantTablesController@updateAll');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/admin', 'AdminController');

Route::resource('/admin/restaurants', 'AdminRestaurantsController');

Route::resource('/admin/restaurant/tables', 'AdminRestaurantTablesController');

Route::post('/admin/restaurant/tables/add_all', 'AdminRestaurantTablesController@insertAll');
Route::post('/admin/restaurant/tables/edit_all', 'AdminRestaurantTablesController@updateAll');

Route::get('/change_language/{locale}', function ($locale) {
    setcookie('my_locale', $locale, time() + (86400 * 30), "/");
    return redirect()->back();
});




