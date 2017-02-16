<?php

// Route paparan halaman utama
Route::get('/', 'PagesController@homepage');
// Route paparan senarai kursus
Route::get('senarai-kursus', 'PagesController@list_kursus');
// Route borang permohonan
Route::get('kursus/permohonan', 'KursusController@paparBorangPermohonan');
Route::post('kursus/permohonan', 'KursusController@prosesBorangPermohonan');



Route::group( ['middleware' => 'auth'], function() {

  // Paparkan senarai user yang ada dalam sistem
  Route::get('member', 'UsersController@index');
  // Papar borang tambah user
  Route::get('member/create', 'UsersController@create')->name('addUser');
  // Simpan rekod user baru
  Route::post('member/create', 'UsersController@store');
  // Papar borang edit profile user
  Route::get('member/{id}/edit', 'UsersController@edit')->name('editUser');
  // Kemaskini rekod user ke dalam database
  Route::patch('member/{id}', 'UsersController@update')->name('updateUser');
  // Hapus user
  Route::delete('member/{id}', 'UsersController@destroy')->name('deleteUser');


  // Paparkan senarai kursus yang ada dalam sistem
  Route::get('kursus', 'KursusController@index')->name('indexKursus');
  // Papar borang tambah kursus
  Route::get('kursus/create', 'KursusController@create')->name('addKursus');
  // Simpan rekod kursus baru
  Route::post('kursus/create', 'KursusController@store')->name('storeKursus');
  // Papar borang edit kursus
  Route::get('kursus/{id}/edit', 'KursusController@edit')->name('editKursus');
  // Kemaskini rekod kursus ke dalam database
  Route::patch('kursus/{id}', 'KursusController@update')->name('updateKursus');
  // Hapus kursus
  Route::delete('kursus/{id}', 'KursusController@destroy')->name('deleteKursus');

});

Auth::routes();

Route::get('/home', 'HomeController@index');
