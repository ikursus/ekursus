<?php

// Route paparan halaman utama
Route::get('/', 'PagesController@homepage');
// Route paparan senarai kursus
Route::get('senarai-kursus', 'PagesController@list_kursus');
// Route borang permohonan
Route::get('kursus/permohonan', 'KursusController@permohonan');



Route::group( ['middleware' => 'auth'], function() {

  // Contoh route yang mengandungi parameters
  Route::get('profile/{username?}', function($username = null) {

    echo 'Selamat datang ' . $username ;

  });

  // Contoh route yang mengandungi parameters
  Route::get('logout', function() {

    echo 'Anda sudah logout';

  });

});

Auth::routes();

Route::get('/home', 'HomeController@index');
