<?php
Route::group(['prefix'=>'home'],function(){
		Route::group(['middleware'=>'auth:web'],function(){	
			Route::get('/', 'webController@home')->name('home');
			Route::get('downloadBook/{bookid}','webController@DownloadBook')->name('download');
			//Account Settings 
			Route::get('settings/{userId}','webController@settings')->name('settings');
			Route::post('setting/{userId}', 'webController@UpdateAccount')->name('update');
		});
		//Show Books For guests
		Route::get('show/books','webController@showBooks')->name('books');
		Route::get('new/books','webController@newbooks')->name('newbooks');
		Route::get('section/books/{sectionId}','webController@SectionBooks')->name('section_books');
		//Contact us Route
        Route::post('contact', 'webController@contactUs')->name('contact');
		// login and logout Routes for user...
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::get('logout', 'Auth\LoginController@logout')->name('userlogout');
        // Registration Routes for user...
        if ($options['register'] ?? true) {
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'Auth\RegisterController@register');
        }
        // Password Reset Routes for users...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    
});
//sign in using social networks
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');