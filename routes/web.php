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

use Illuminate\Support\Facades\Route;

Route::get('/login', 'LogInController@index')->name('login');
Route::post('/login', 'LogInController@login')->name('login.post');

Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@register')->name('register.post');

Route::post('/logout', 'LogOutController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::view('/petunjuk', 'mahasiswa.petunjuk')->name('petunjuk');

Route::middleware('auth')->group(function () {
    Route::view('/profil', 'mahasiswa.profil')->name('profil');
    Route::view('/profil/edit', 'mahasiswa.profiledit')->name('profil.edit');
    Route::redirect('/profile/edit/post', '/profil')->name('profil.edit.post');

    Route::get('/praktikum/{praktikumId}/materi', 'PraktikumController@materi')->name('praktikum.materi');
    Route::get('/praktikum/{praktikumId}/video', 'PraktikumController@video')->name('praktikum.video');
    Route::get('/praktikum/{praktikumId}/test', 'PraktikumController@ujian')->name('praktikum.test');
    Route::post('/praktikum/{praktikumId}/test', 'PraktikumController@ujianPost')->name('praktikum.test.post');
    Route::get('/praktikum/{praktikumId}/score', 'PraktikumController@score')->name('praktikum.score');

    Route::get('/exam/{examId}', 'ExamController@index')->name('exam');
    Route::post('/exam/{examId}', 'ExamController@submit')->name('exam.submit');
});