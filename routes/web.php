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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', 'StoreController')->name('post.like.store');
    });
});


Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
    Route::get('/', 'IndexController')->name('category.index');
    Route::group(['namespace' => 'Post', 'prefix' => '{categories}/posts'], function () {
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});


Route::group([
    'as' => 'auth.', // имя маршрута, например auth.index
    'prefix' => 'auth', // префикс маршрута, например auth/index
], function () {
    // форма регистрации
    Route::get('register', 'Auth\RegisterController@register')
        ->name('register');
    // создание пользователя
    Route::post('register', 'Auth\RegisterController@create')
        ->name('create');
    // форма входа
    Route::get('login', 'Auth\LoginController@login')
        ->name('login');
    // аутентификация
    Route::post('login', 'Auth\LoginController@authenticate')
        ->name('auth');

    // форма ввода адреса почты
    Route::get('forgot-password', 'Auth\ForgotPasswordController@form')
        ->name('forgot-form');
    // письмо на почту
    Route::post('forgot-password', 'Auth\ForgotPasswordController@mail')
        ->name('forgot-mail');
    // форма восстановления пароля
    Route::get(
        'reset-password/token/{token}/email/{email}',
        'Auth\ResetPasswordController@form'
    )->name('reset-form');
    // восстановление пароля
    Route::post('reset-password', 'Auth\ResetPasswordController@reset')
        ->name('reset-password');

});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware'=>['auth','personal']], function(){
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');;
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');;
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('personal.post.index');
        Route::get('/create', 'CreateController')->name('personal.post.create');
        Route::post('/', 'StoreController')->name('personal.post.store');
        Route::get('/{post}', 'ShowController')->name('personal.post.show');
        Route::get('/liked/{post}', 'LikedShowController')->name('personal.post.likedshow');
        Route::get('/{post}/edit', 'EditController')->name('personal.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('personal.post.update');
        Route::delete('/{post}', 'DeleteController')->name('personal.post.delete');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware'=>['auth','admin']], function(){
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/{user}/posts', 'UserController')->name('admin.post.user');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });


});

Auth::routes(['verify'=> true]);


