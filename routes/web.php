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

Route::group(['middleware'=>'web'], function() {

    Route::match(['get', 'post'], '/', 'IndexController@execute')->name('home');
    Route::get('/page/{alias}', 'PageController@execute')->name('page');


    Route::auth();

});

//admin/page?/portfolio?/
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {

    //admin
    Route::get('/', function () {
        if(view()->exists('admin.index')) {
            $data = ['title' => 'Панель администратора'];

            return view('admin.index', $data);
        }
    });

    //admin/pages
    Route::group(['prefix' => 'pages'], function() {

        //admin/pages
        Route::get('/', 'PagesController@execute')->name('pages');


        //admin/pages/add
        Route::match(['get', 'post'], '/add', 'PagesAddController@execute')->name('pagesAdd');


        //admin/edit/{page}
        Route::match(['get', 'post'], '/edit/{page}', 'PagesEditController@execute')->name('pagesEdit');

        //admin/edit/{page}
        Route::delete('/edit/{page}', 'PagesEditController@delete');

    });



    Route::group(['prefix' => 'portfolios'], function() {


        Route::get('/', 'PortfoliosController@execute')->name('portfolios');


        Route::match(['get', 'post'], '/add', 'PortfoliosAddController@execute')->name('portfoliosAdd');


        Route::match(['get', 'post'], '/edit/{portfolio}', 'PortfoliosEditController@execute')->name('portfoliosEdit');

        Route::delete('/edit/{portfolio}', 'PortfoliosEditController@delete');

    });

    Route::group(['prefix' => 'services'], function() {


        Route::get('/', 'ServicesController@execute')->name('services');

        Route::match(['get', 'post'], '/add', 'ServicesAddController@execute')->name('servicesAdd');


        Route::match(['get', 'post'], '/edit/{service}', 'ServicesEditController@execute')->name('servicesEdit');

        Route::delete('/edit/{service}', 'ServicesEditController@delete');

    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
