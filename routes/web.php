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
Route::patch('member/{id}', 'UsersController@update');
// Hapus user
Route::delete('member/{id}', 'UsersController@destroy');

});

Auth::routes();

Route::get('/home', 'HomeController@index');
