<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*
*	comment these 3 lines here for test
|	Route::get('/', function () {
|    return view('welcome');
|	});
*
*
*/



/*
*  The following route is added by charles
*  2-11-2016
*
*/

Route::get('/hi', function () {
    return 'welcome to New Landmark!';
});



/*
*  The following route is added by charles
*  4-11-2016
*
*/

Route::get('/version', function () {
	$exitCode = Artisan::call('help:', ['--option' => 'foo']);
    
});


/*
*  The following routes are added by charles
*  14-11-2016
*  test of matrix admin
*
*/

Route::get('/matrixadmin/simpleform',[
	'uses' => 'Controller@masimpleform',
	'as' => 'masimpleform'
	]);


Route::get('/matrixadmin/singleinputform',[
	'uses' => 'Controller@masingleinputform',
	'as' => 'masingleinputform'
	]);


/*
*  The following route is added by charles
*  4-11-2016
*
*/

Route::get('/', [
	'uses' => 'Controller@index',
	'as' => 'index'
	]);  
Route::get('/post/new',[
	'uses' => 'Controller@newPost',
	'as' => 'newPost'
	]);


Route::post('/post/new',[
	'uses' => 'Controller@createPost',
	'as' => 'createPost'
	]);

/*
*	Only assign route, don't send parameters
*	No csrf here, any security issue?
*/
Route::get('/post/{id}',[
	'uses' => 'Controller@viewPost',
	'as' => 'viewPost'
	]);

Route::post('/post/{id}/comments',[
	'uses' => 'Controller@createComment',
	'as' => 'createComment'
	]);

Route::get('/post/{id}/viewcomments',[
	'uses' => 'Controller@viewComments',
	'as' => 'viewComments'
	]);





