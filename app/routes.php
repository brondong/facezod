<?php

/**
 * route aplikasi
 */
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::post('/', array('uses' => 'HomeController@home'));

Route::get('/{zodiak?}', array('as' => 'custom', 'uses' => 'HomeController@customZodiak'))->where('zodiak', '[A-z]+');


Route::get('login', array('as' => 'login', 'uses' => 'HomeController@login'));


Route::get('logout', array('as' => 'logout', 'uses' => 'HomeController@logout'));


/**
 * route admin
 */
// login
Route::get('founder/masuk', array('as' => 'admin_login', 'uses' => 'AdminController@login'));
Route::post('founder/masuk', array('uses' => 'AdminController@postLogin'));


// home
Route::get('founder/home', array('as' => 'admin_home', 'uses' => 'AdminController@home'));


// tambah ramalan
Route::get('founder/ramalan/tambah', array('as' => 'tambah_ramalan', 'uses' => 'AdminController@formTambahRamalan'));
Route::post('founder/ramalan/tambah', array('uses' => 'AdminController@tambahRamalan'));


// data ramalan
Route::get('founder/ramalan/data', array('as' => 'data_ramalan', 'uses' => 'AdminController@dataRamalan'));


// rubah ramalan
Route::get('founder/ramalan/rubah/{id?}', array('as' => 'rubah_ramalan', 'uses' => 'AdminController@formRubahRamalan'))->where('id', '\d+');
Route::post('founder/ramalan/rubah/{id?}', array('uses' => 'AdminController@rubahRamalan'))->where('id', '\d+');


// hapus ramalan
Route::get('founder/ramalan/hapus/{id?}', array('as' => 'hapus_ramalan', 'uses' => 'AdminController@konfirmasiHapusRamalan'))->where('id', '\d+');
Route::post('founder/ramalan/hapus/{id?}', array('uses' => 'AdminController@hapusRamalan'))->where('id', '\d+');


// tambah ramalan
Route::get('founder/admin/tambah', array('as' => 'tambah_admin', 'uses' => 'AdminController@formTambahAdmin'));
Route::post('founder/admin/tambah', array('uses' => 'AdminController@tambahAdmin'));


// data admin
Route::get('founder/admin/data', array('as' => 'data_admin', 'uses' => 'AdminController@dataAdmin'));


// rubah admin
Route::get('founder/admin/rubah/{id?}', array('as' => 'rubah_admin', 'uses' => 'AdminController@formRubahAdmin'))->where('id', '\d+');
Route::post('founder/admin/rubah/{id?}', array('uses' => 'AdminController@rubahAdmin'))->where('id', '\d+');


// hapus admin
Route::get('founder/admin/hapus/{id?}', array('as' => 'hapus_admin', 'uses' => 'AdminController@konfirmasiHapusAdmin'))->where('id', '\d+');
Route::post('founder/admin/hapus/{id?}', array('uses' => 'AdminController@hapusAdmin'))->where('id', '\d+');


// rubah nama
Route::get('founder/nama/rubah', array('as' => 'rubah_nama', 'uses' => 'AdminController@formRubahNama'));
Route::post('founder/nama/rubah', array('uses' => 'AdminController@rubahNama'));


// rubah username
Route::get('founder/username/rubah', array('as' => 'rubah_username', 'uses' => 'AdminController@formRubahUsername'));
Route::post('founder/username/rubah', array('uses' => 'AdminController@rubahUsername'));


// rubah password
Route::get('founder/password/rubah', array('as' => 'rubah_password', 'uses' => 'AdminController@formRubahPassword'));
Route::post('founder/password/rubah', array('uses' => 'AdminController@rubahPassword'));


// logout
Route::get('founder/logout/ceo', array('as' => 'admin_logout', 'uses' => 'AdminController@logout'));