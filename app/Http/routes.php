<?php

Route::group(['middleware' => 'web'], function () {

	// login hak akses
	Route::auth();

	// home
	Route::get('/', function () {
    	return view('home/home');
	});
	
	Route::get('/home', 'HomeController@index');


	Route::resource('/kehilangan', 'KehilanganController');

	// Route untuk user akses Admin
	Route::group(['middleware' => ['auth','admin']], function () {

		// dashboard admin
		Route::get('/admin', 'Administrator\AdministratorController@DashboardAdmin');
		// profile admin
		Route::get('admin/profile/{id}', 'Administrator\AdministratorController@ProfileAdmin');

		// pengelolaan data User
		Route::get('admin/user',['as' => 'user.index','uses' =>'Administrator\UserController@index']);
		
		// kelola blokir
		Route::post('admin/user/blokir/{username}', [
			  'as' => 'user.blokir', 'uses' =>   'Administrator\UserController@blokir'
			]);

		// resetpassword
		Route::post('admin/user/reset/{username}', [
			  'as' => 'user.resetpassword', 'uses' =>   'Administrator\UserController@resetpassword'
			]);

		// pengelolaan data petugas
		Route::resource('userpetugas', 'Administrator\UserPetugasController');
	});
	
	// Route untuk user akses Petugas
	Route::group(['middleware' => ['auth', 'petugas']], function () {
		// dashboard petugas
		Route::get('/petugas', 'Administrator\AdministratorController@DashboardPetugas');
		// profile admin
		Route::get('petugas/profile/{id}', 'Administrator\AdministratorController@ProfilePetugas');
		// pengelolaan data pemilik
		Route::resource('userpemilik', 'Administrator\UserPemilikController');
		// verifikasi
		Route::post('userpemilik/verifikasi/{username}', [
			  'as' => 'userpemilik.verifikasi', 'uses' =>   'Administrator\UserPemilikController@verifikasi'
			]);
		// pengelolaan identitas pemilik
		Route::resource('identitas', 'Administrator\IdentitasController',['only' =>['store', 'update']]);
		// pengelolaan identitas pemilik
		Route::resource('pengolahan/kehilangan', 'Administrator\KehilanganController');

		// cetak laporan kehilangan
		Route::get('pengolahan/kehilangan/{id_proses}/cetak', ['as' => 'pengolahan.kehilangan.cetak', 'uses' => 'Administrator\KehilanganController@cetak']);

		// edit kejadian
		Route::get('pengolahan/kehilangan/{id_proses}/{id_kejadian}/editkejadian', ['as' => 'pengolahan.kehilangan.editkejadian', 'uses' => 'Administrator\KejadianController@EditKejadian']);
		Route::patch('pengolahan/kehilangan/{id_proses}/{id_kejadian}/updatekejadian', ['as' => 'pengolahan.kehilangan.updatekejadian', 'uses' => 'Administrator\KejadianController@UpdateKejadian']);
	});

	// Route untuk user akses pemilik
	Route::group(['middleware' => ['auth', 'pemilik']], function () {
		
		// Kelola profile
		Route::get('profile/{id}', ['as' => 'pemilik.profile', 'uses' => 'pemilik\PemilikController@profile']);
		Route::get('profile/{id}/edit', ['as' => 'pemilik.edit', 'uses' => 'pemilik\PemilikController@EditProfile']);
		Route::patch('profile/{id}', ['as' => 'pemilik.simpan', 'uses' => 'pemilik\PemilikController@SimpanProfile']);

		// kelola identitas lampiran
		Route::get('profile/{id}/identitas', ['as' => 'pemilik.identitas', 'uses' => 'pemilik\IdentitasPemilikController@Identitas']);
		Route::get('profile/{id}/identitas/tambah', ['as' => 'pemilik.identitas.tambah', 'uses' => 'pemilik\IdentitasPemilikController@TambahIdentitas']);
		Route::post('profile/{id}/identitas/tambah', ['as' => 'pemilik.identitas.simpan', 'uses' => 'pemilik\IdentitasPemilikController@SimpanIdentitas']);
		Route::get('profile/{id}/identitas/edit', ['as' => 'pemilik.identitas.edit', 'uses' => 'pemilik\IdentitasPemilikController@EditIdentitas']);
		Route::patch('profile/{id}/identitas/edit', ['as' => 'pemilik.identitas.update', 'uses' => 'pemilik\IdentitasPemilikController@UpdateIdentitas']);

		// kelola laporan kehilangan
		Route::get('profile/{id}/kehilangan', ['as' => 'pemilik.kehilangan', 'uses' => 'pemilik\LaporanKehilanganController@index']);
		Route::get('profile/{username}/kehilangan/{id_proses}/detail', ['as' => 'pemilik.kehilangan.detail', 'uses' => 'pemilik\LaporanKehilanganController@detail']);
		Route::get('profile/{username}/kehilangan/tambah', ['as' => 'pemilik.kehilangan.tambah', 'uses' => 'pemilik\LaporanKehilanganController@tambah']);
		Route::post('profile/{username}/kehilangan/simpan', ['as' => 'pemilik.kehilangan.simpan', 'uses' => 'pemilik\LaporanKehilanganController@simpan']);

		// cetak laporan kehilangan
		Route::get('profile/{username}/kehilangan/{id_proses}/cetak', ['as' => 'pemilik.kehilangan.cetak', 'uses' => 'pemilik\LaporanKehilanganController@cetak']);

		// edit kejadian
		Route::get('profile/{username}/kehilangan/{id_proses}/editkejadian', ['as' => 'pemilik.kehilangan.editkejadian', 'uses' => 'pemilik\LaporanKehilanganController@EditKejadian']);
		Route::patch('profile/{username}/kehilangan/{id_proses}/updatekejadian', ['as' => 'pemilik.kehilangan.kejadianupdate', 'uses' => 'pemilik\LaporanKehilanganController@UpdateKejadian']);

		// CRUD data Barang
		Route::get('profile/{username}/kehilangan/{id_proses}/barang/tambah', ['as' => 'pemilik.barang.tambah', 'uses' => 'pemilik\BarangController@tambah']);
		Route::post('profile/{username}/kehilangan/{id_proses}/barang/tambah', ['as' => 'pemilik.barang.simpan', 'uses' => 'pemilik\BarangController@simpan']);
		Route::get('profile/{username}/kehilangan/{id_proses}/barang/{id_barang}/edit', ['as' => 'pemilik.barang.edit', 'uses' => 'pemilik\BarangController@edit']);
		Route::patch('profile/{username}/kehilangan/{id_proses}/barang/{id_barang}/update', ['as' => 'pemilik.barang.update', 'uses' => 'pemilik\BarangController@update']);
		Route::delete('profile/{username}/kehilangan/{id_proses}/barang/{id_barang}/hapus', ['as' => 'pemilik.barang.hapus', 'uses' => 'pemilik\BarangController@hapus']);
	});

});

