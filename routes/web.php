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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('Client/index',['as'=>'Client.index','uses'=>'Client\ClientController@index'/*,'middleware' => ['permission:role-create']*/]);
Route::get('Client/create',['as'=>'Client.create','uses'=>'Client\ClientController@create'/*,'middleware' => ['permission:role-create']*/]);
Route::post('Client/store',['as'=>'Client.store','uses'=>'Client\ClientController@store'/*,'middleware' => ['permission:role-create']*/]);
Route::get('Client/{id}/edit',['as'=>'Client.edit','uses'=>'Client\ClientController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::get('Client/{id}/show',['as'=>'Client.show','uses'=>'Client\ClientController@show', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Client/{id}',['as'=>'Client.destroy','uses'=>'Client\ClientController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Client/{id}',['as'=>'Client.update','uses'=>'Client\ClientController@update'/*,'middleware' => ['permission:role-edit']*/]);

Route::get('Group/index',['as'=>'Group.index','uses'=>'Group\GroupController@index'/*,'middleware' => ['permission:role-create']*/]);
Route::get('Group/create',['as'=>'Group.create','uses'=>'Group\GroupController@create'/*,'middleware' => ['permission:role-create']*/]);
Route::post('Group/store',['as'=>'Group.store','uses'=>'Group\GroupController@store'/*,'middleware' => ['permission:role-create']*/]);
Route::get('Group/{id}/edit',['as'=>'Group.edit','uses'=>'Group\GroupController@edit', /*'middleware' => ['permission:role-edit']*/]);
Route::get('Group/{id}/show',['as'=>'Group.show','uses'=>'Group\GroupController@show', /*'middleware' => ['permission:role-edit']*/]);
Route::delete('Group/{id}',['as'=>'Group.destroy','uses'=>'Group\GroupController@destroy'/*'middleware' => ['permission:role-delete']*/]);
Route::patch('Group/{id}',['as'=>'Group.update','uses'=>'Group\GroupController@update'/*,'middleware' => ['permission:role-edit']*/]);