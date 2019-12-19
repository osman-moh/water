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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('reports', 'ReportsController')->middleware('auth');
Route::get('reports-all', 'ReportsController@getReports')->middleware('auth');

Route::resource('locations', 'LocationsController')->middleware('auth');
Route::post('/loctiontable', 'LocationsController@index')->middleware('auth')->name('loctiontable');

Route::resource('category', 'CategoriesController')->middleware('auth');
Route::post('/categorytable', 'CategoriesController@index')->middleware('auth')->name('categorytable');

Route::resource('cities', 'CitiesController')->middleware('auth');
Route::post('/lloctiontable', 'CitiesController@index')->middleware('auth')->name('lloctiontable');

Route::resource('localities', 'LocalitiesController')->middleware('auth');
Route::post('/regionaltable', 'LocalitiesController@index')->middleware('auth')->name('regionaltable');

Route::resource('towns', 'TownsController')->middleware('auth');
Route::post('/Citytable', 'TownsController@index')->middleware('auth')->name('Citytable');
Route::get('towns-all', 'TownsController@getTowns')->middleware('auth');
Route::resource('squares', 'SquaresController')->middleware('auth');
Route::post('/Squaretable', 'SquaresController@index')->middleware('auth')->name('Squaretable');
Route::get('squares-all', 'SquaresController@getSquares')->middleware('auth');

Route::resource('offices', 'OfficesController')->middleware('auth');
Route::post('/Subofficestable', 'OfficesController@index')->middleware('auth')->name('Subofficestable');

Route::resource('user', 'UserController')->middleware('auth');

Route::get('reports/done/{id}', 'ReportsController@done')->middleware('auth')->name('Commdone');
Route::get('reports/undone/{id}', 'ReportsController@undone')->middleware('auth')->name('Commundone');

Route::resource('reportType', 'ReportTypeController')->middleware('auth');
Route::post('/report_typetable', 'ReportTypeController@index')->middleware('auth')->name('report_typetable');

Route::resource('usersType', 'UsersTypeController')->middleware('auth');
Route::post('/usersTypetable', 'UsersTypeController@index')->middleware('auth')->name('usersTypetable');
Route::resource('usersType', 'UsersTypeController')->middleware('auth');
Route::post('/usersTypetable', 'UsersTypeController@create')->middleware('auth')->name('usersTypetable');

Route::resource('report_sub_types', 'ReportSubTypeController')->middleware('auth');

Route::resource('report_sub_details', 'ReportSubDetailController')->middleware('auth');

//Water reports routes
Route::prefix('water-reports')->name('water-reports.')->group(function () {

    Route::get('/', 'WaterReportsController@index')->name('index');

    Route::get('/summary', 'WaterReportsController@generateSumReport')->name('summary');

    Route::get('/generate', 'WaterReportsController@generateReport')->name('generate');

    Route::post('/generate', 'WaterReportsController@generateReport')->name('generate');

    Route::post('/summary', 'WaterReportsController@generateSumReport')->name('summary');
});


//Ajax requests
Route::get('city-localities-list/{id}', 'CitiesController@getLocalities');

Route::get('locality-offices-list/{id}', 'LocalitiesController@getOffices');

Route::get('office-towns-list/{id}', 'OfficesController@getTowns');

Route::get('town-squares-list/{id}', 'TownsController@getSquares');

Route::get('report-subtype-list/{id}', 'ReportTypeController@getReportSubType');

Route::get('report-sub-detail-list/{id}', 'ReportSubDetailController@getReportSubDetail');

Route::get('city-offices-list/{id}', 'UserController@getOffices');

// update Report status (sending SMS):

Route::patch('/reports/update-status/{id}', 'ReportsController@updateStatus');

Route::get('/check-house-number', 'ReportsController@checkHouse');

// dashborad routes

Route::get('dashboard/{start}/{end}/reports', 'DashboardController@getReports');

//تغير كلمة السر
Route::post('/changepass', 'UserController@postChangePassword')->name('changepass')->middleware('auth');
