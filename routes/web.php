<?php
// use Symfony\Component\Routing\Annotation\Route;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['middleware' => ['admin']], function () {
    Route::get('/task/list','TaskController@getListTask');
    route::get('/task/register','TaskController@registerTask');
    route::post('/task/save','TaskController@saveTask');
    route::get('/task/delete/{id}','TaskController@deleteTask');
    Route::get('/task/management','TaskController@listManagementTask');
    Route::get('/task/management/accept/{id}','TaskController@listManagementAcceptTask');
    Route::get('/task/management/refuse/{id}','TaskController@listManagementRefuseTask');

    Route::get('/dataset/upload','DatasetController@viewUpload');
    Route::post('/dataset/save','DatasetController@store');

});


Route::group(['middleware' => ['user']], function () {
    Route::get('/task/user','TaskController@viewTaskUser');
    Route::get('/task/book/{id}','TaskController@bookTask');
    Route::get('/task/revoke/{id}','TaskController@revokeTask');
    Route::get('/task/dataset/download/{id}','TaskController@downloadDataset');

});






