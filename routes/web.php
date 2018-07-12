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

//Kumbushaa controller
Route::get('kumbusha','KumbushaaController@kmb');

Route::get('nyumbani','HomeController@nyumbani');

Route::get('zote','JaribuController@zote');

Route::get
('adda',['uses'=>'JaribuController@add'
,'as' => 'adda']);

Route::
post('save','JaribuController@save');

Route::get
('delete/{id}',['uses'=>'JaribuController@delete'
,'as' => 'delete']);

Route::get
('all',['as' => 'all',
'uses' => 'LeahController@lister']);

Route::post
('add',['as' => 'add',
'uses' => 'LeahController@add']);

Route::get('del/{id}',
['uses' => 'LeahController@delete','as' => 'del']);

Route::get(
  //List all chapos
  'chapos/all',
  // as: name of the route
  // uses: specify method you want the route to execute
  ['as'=> 'chapos/all',
   'uses'=> 'ChapoController@all_chapos'
  ]
);

Route::post(
  //Delete a Chapo
  'chapo/del',
  [ 'as'=>'chapo/del',
    'uses'=>'ChapoController@tupa_chapo'
  ]
);

Route::post(
  //Add a Chapo
  'chapo/save',
  [ 'as'=>'chapo/save',
    'uses'=>'ChapoController@weka_chapo'
  ]
);

Route::post(
  //Edit a Chapo
  'chapo/edit',
  [ 'as'=>'chapo/edit',
    'uses'=>'ChapoController@edit_chapo'
  ]
);
