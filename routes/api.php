<?php

use Illuminate\Http\Request;


/// http://localhost/jwt/public/api/users 


 //route users
 
 Route::group(['prefix' => 'users'], function() {

    Route::get('/','UserController@index'); // show 
    Route::post('/','UserController@create'); // create
   // Route::get('/{id}','UserController@edit'); //edit
   //Route::put('/{id}','UserController@update'); //update usera  	

 });

 //route template

 Route::group(['prefix' => 'templates'], function() {

        Route::get('/','TemplateController@index'); // show
        Route::post('/','TemplateController@store'); // create
        Route::get('/{id}','TemplateController@edit'); //edit
        Route::put('/{id}','TemplateController@update'); //update 	
        Route::delete('/{id}','TemplateController@destroy'); //destroy

 // route groups

Route::group(['prefix' => 'groups'], function() {
          
         Route::get('/all','TemGroController@index'); // show
         Route::post('/','TemGroController@store'); // create
         Route::get('/{id}','TemGroController@edit'); //edit
         Route::put('/{id}','TemGroController@update'); //update 	
         Route::delete('/{id}','TemGroController@destroy'); //destroy         
          
               });

     });

//route LoginIn

Route::post('/login','LoginController@signin');

Route::get('/me',['middleware' => ['jwt.auth'],'uses'=>'LoginController@me']);

 
//route projects

Route::group(['prefix' => 'projects',], function() {
 
  Route::group(['middleware' => 'jwt.auth',], function() {
    
      Route::get('/','ProjectsController@index'); // show 
      Route::post('/','ProjectsController@store'); // create
      Route::get('/{id}','ProjectsController@edit'); //edit
      Route::put('/{id}','ProjectsController@update'); //update 	
      Route::delete('/{id}','ProjectsController@destroy'); //destroy
      });

   });
 

    Route::post('upload/file',['middleware' => ['jwt.auth'], 'uses' => 'ImagesController@saveFile' ]);
    
    Route::get('file/{name}',['middleware' => ['jwt.auth'], 'uses' => 'ImagesController@viewFile'  ]);

    