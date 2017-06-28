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

Route::get('/', 'HomeController@index');
Auth::routes();
/*INDEX.BLADE*/        Route::get('/home', 'HomeController@index')->name('home');//to see the main page with all articles
/*PROFILE.BLADE*/ /**/     Route::get('/profile/{username}','ProfileController@profile');//to see the profile of the user
/*EDIT.BLADE(the id of article)*/         Route::get('/articles/edit/{id}','ArticlesController@edit');//to edit your profile
/*MYARTICLES BLADE(the id of user)*/   Route::get('/myarticles/{id}','ArticlesController@showmyarticles');//to see my articles
/*SHOW.BLADE (the id of article)*/         Route::get('/articles/{id}','ArticlesController@show');//to see a specific article
/*CREATE.BLADE(the id of user)*/       Route::get('/articles/create/{id}','ArticlesController@create');//Create new article
/*SEEPROFILE.BLADE(the id of the user)*/   Route::get('/seeprofile/show/{id}','ArticlesController@seeprofile');
/*EDITPROFİLE.BLADE(the id of the user)*/  Route::get('/profile/edit/{id}','UserController@edit');
/*INDEX.BLADE*/        Route::get('/index','ArticlesController@index');//to go to main page

Route::resource('articles','ArticlesController');
Route::resource('user','UserController');