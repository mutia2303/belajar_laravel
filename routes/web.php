<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'FrontController@home');
Route::get('/register', 'FrontController@register');
Route::post('/proses_register', 'FrontController@proses_register');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/proses_login', 'AuthController@proses_login');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkrole:admin']], function() {
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/tambah', 'SiswaController@tambah');
	Route::get('/siswa/{siswa}/edit', 'SiswaController@edit');
	Route::post('/siswa/{siswa}/proses_edit', 'SiswaController@proses_edit');
	Route::get('/siswa/{siswa}/hapus', 'SiswaController@hapus');
	Route::get('/siswa/{siswa}/profil', 'SiswaController@profil');
	Route::post('/siswa/{id}/tambah_nilai', 'SiswaController@tambah_nilai');
	Route::get('/siswa/{idsiswa}/{idmapel}/hapus_nilai', 'SiswaController@hapus_nilai');
	Route::get('/siswa/export_excel', 'SiswaController@export_excel');
	Route::get('/siswa/export_pdf', 'SiswaController@export_pdf');

	Route::get('/guru', 'GuruController@index');
	Route::post('/guru/tambah', 'GuruController@tambah');
	Route::get('/guru/{id}/edit', 'GuruController@edit');
	Route::post('/guru/{id}/proses_edit', 'GuruController@proses_edit');
	Route::get('/guru/{id}/hapus', 'GuruController@hapus');
	Route::get('/guru/{id}/profil', 'GuruController@profil');

	Route::get('/mapel', 'MapelController@index');
	Route::post('/mapel/tambah', 'MapelController@tambah');
	Route::get('/mapel/{id}/edit', 'MapelController@edit');
	Route::post('/mapel/{id}/proses_edit', 'MapelController@proses_edit');
	Route::get('/mapel/{id}/hapus', 'MapelController@hapus');

	Route::get('/nilai', 'SiswaController@nilai');

	Route::get('/post', 'PostController@index')->name('post.index');
	Route::get('/post/tambah', [
		'uses' => 'PostController@tambah',
		'as' => 'post.tambah'
	]);
	Route::post('/post/proses_tambah', [
		'uses' => 'PostController@proses_tambah',
		'as' => 'post.proses.tambah'
	]);
	Route::get('/post/{post}/edit', 'PostController@edit');
	Route::post('/post/{post}/proses_edit', 'PostController@proses_edit');
	Route::get('/post/{post}/hapus', 'PostController@hapus');

	Route::get('/getdatasiswa', [
		'uses' => 'SiswaController@getdatasiswa',
		'as' => 'ajax.get.data.siswa'
	]);
	Route::post('/importexcel', [
		'uses' => 'SiswaController@importexcel',
		'as' => 'siswa.import.excel'
	]);
});
	
Route::group(['middleware' => ['auth', 'checkrole:admin,siswa,guru']], function() {
	Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => ['auth', 'checkrole:siswa']], function() { 
	Route::get('/profil_saya', 'SiswaController@profil_saya');
});

Route::get('/forum', 'ForumController@index');
Route::post('/forum/tambah', 'ForumController@tambah');
Route::get('/forum/{forum}/detail', 'ForumController@detail');

Route::get('/{slug}', [
	'uses' => 'FrontController@single_post',
	'as' => 'front.single.post'
]);
