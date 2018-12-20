<?php 
	Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
		Config::set('auth.defines','admin');
		Route::group(['middleware'=>'admin:admin'],function(){
			//Start Sections Routes
			Route::get('/','SectionController@index');
			Route::resource('section','SectionController');
			Route::get('section/restore/{id}','SectionController@restore');
			Route::get('section/ForceDelete/{id}','SectionController@ForceDelete');
			//End Sections Routes
			//Start Books Routes
			Route::resource('book','BookController');
			Route::get('book/restore/{id}','BookController@restore');
			Route::get('book/ForceDelete/{id}','BookController@ForceDelete');
			//End Books Routes
			Route::any('logout','adminAuth@logout')->name('logout');
		});
		//admin login
		Route::get('login','adminAuth@login')->name('adminLogin');
		Route::post('login','adminAuth@logined')->name('logined');
		//admin forgot password
		Route::get('forgot/password','adminAuth@Forget_password')->name('forgotPass');
		Route::post('forgot/password','adminAuth@verifieEmail')->name('verifiemail');
		//reset password
		Route::get('reset/password/{token}','adminAuth@resetAdminPassword');
		Route::post('reset/password/{token}','adminAuth@NewResetAdminPassword');
	});
