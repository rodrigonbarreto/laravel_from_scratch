<?php

//get var from config/service -> config();
//dd(config('services.stripe.secret'));


// option1 for service container
//$stripe = App::make('App\Billing\Stripe');
//option 2
//$stripe = app('App\Billing\Stripe');

//option 3 -> I prefer this and let's to use more Stripe::class it's a good practice
$stripe = resolve(\App\Billing\Stripe::class);

Route::get('/', 'PostsController@index')->name('home');
Route::get('posts/create', 'PostsController@create');
Route::post('posts', 'PostsController@store');
Route::get('posts/{post}', 'PostsController@show');

Route::post('posts/{post}/create', 'CommentsController@store');

Route::get('author/{user}', 'AuthorsController@show');

Route::get('home', 'DashboardController@index')->name('dashboard');
Route::get('/tags/{tag}', 'TagsController@index')->name('tags');

Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');