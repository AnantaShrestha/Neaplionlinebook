<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/clear-cache',function(){
     \Artisan::call('config:cache');
	\Artisan::call('cache:clear');
	\Artisan::call('view:clear');
	\Artisan::call('route:clear');
     return redirect('/');
});
Route::post('uniqueVisitor','Admin\ChartController@countVisitor');

Route::group(['namespace'=>'Front'],function(){
	Route::get('/','IndexController@index')->name('/');
	Route::get('allBook','ProductController@allBook')->name('allBook');
	Route::get('categoryBook/{url}','ProductController@categoryBook')->name('categoryBook');
	Route::get('freeBook','ProductController@free')->name('freeBook');
	Route::get('sellBook','ProductController@sell')->name('sellBook');
	Route::get('productDetails/{id}','ProductController@singleDetails')->name('productDetails');

	Route::get('news','NewsController@news')->name('news');
	Route::get('newsCategory/{url}','NewsController@newsCategory')->name('newsCategory');
	Route::get('newsDetails/{id}','NewsController@singleNews')->name('newsDetails');

	Route::get('blog','BlogController@blog')->name('blog');
	Route::get('blogDetails/{id}','BlogController@singleBlog')->name('blogDetails');
	Route::get('hamroradio','IndexController@radio')->name('hamroradio');
	Route::get('radioData','IndexController@radioData')->name('radioData');
	Route::get('contact','IndexController@contact')->name('contact');
	Route::Post('inquery','IndexController@inquery')->name('inquery');

	Route::get('currency','IndexController@currency')->name('currency');
	Route::get('rasifall','IndexController@rasi')->name('rasifall');
	Route::get('gold/sliver','IndexController@goldsliver')->name('gold.sliver');
	Route::get('aboutus','IndexController@about')->name('aboutus');
	Route::post('search','ProductController@search')->name('search');
	Route::get('allAudio','AudioController@audio')->name('allAudio');
	Route::get('getAudio','AudioController@getAudio')->name('getAudio');
	Route::get('getaudioCategory/{id}','AudioController@getaudioCategory');


});
Route::group(['namespace'=>'Front','middleware'=>'auth'],function(){
	Route::get('userdashboard','IndexController@dashboard')->name('userdashboard');
	Route::get('accountDetails','IndexController@account')->name('accountDetails');
	Route::post('changePasswordUser','IndexController@changePassword')->name('changePasswordUser');
	Route::get('cart','CartController@cart')->name('cart');
	Route::post('cart','CartController@cartStore');
	Route::get('deleteCart/{id}','CartController@delete');
	Route::get('checkout','CartController@checkout')->name('checkout');
	Route::post('checkout','CartController@checkoutProcess');
	Route::get('paymentDetails','IndexController@paymentDetails')->name('payment');
	
});

//failure and successful payement
Route::group(['namespace'=>'Front'], function(){
	Route::any('/payment_success', 'CartController@checkoutProcess');
	Route::any('/payment_failure', 'CartController@paymentFailure');
});

Route::group(['namespace'=>'Admin\Auth','prefix'=>'admin'],function(){
	Route::get('admin-login','AdminLoginController@showLoginForm')->name('admin.admin-login');
	Route::post('admin-login','AdminLoginController@login');
	Route::post('admin-logout','AdminLoginController@logout')->name('admin.admin-logout');
	Route::get('admin/password/email','AdminResetPasswordController@showEmailForm')->name('admin.password.email');
	Route::post('admin/send/reset/email','AdminResetPasswordController@sendresetEmail')->name('admin.send.reset.email');
	Route::post('admin/password/reset','AdminResetPasswordController@reset')->name('admin.password.reset');
	Route::get('admin/password/reset/{token}/{email}','AdminResetPasswordController@showresetLink');

});

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){


	Route::get('home','IndexController@index')->name('admin.home');
	Route::post('changePassword','IndexController@changePassword')->name('admin.changePassword');
	Route::post('getlastsixmonthdata','ChartController@fetch_last_six_month_data')->name('getlastsixmonthdata');

	//category routes
	Route::get('categoryDetails','CategoryController@index')->name('admin.categoryDetails');
	Route::post('categoryStore','CategoryController@store')->name('admin.categoryStore');
	Route::get('editCategory/{id}','CategoryController@edit')->name('admin.editCategory');
	Route::post('updateCategory','CategoryController@update')->name('admin.updateCategory');
	Route::get('deleteCategory/{id}', 'CategoryController@delete')->name('admin.deleteCategory');
	Route::get('sortingCategory','CategoryController@sortingView')->name('admin.sortingCategory');
	Route::post('sortCategory','CategoryController@sortingUpdate')->name('admin.sortCategoryUpdate');

	//product routes
	Route::get('productDetails/{category?}','ProductController@index')->name('admin.productDetails');
	Route::post('productStore','ProductController@store')->name('admin.productStore');
	Route::get('editProduct/{id}','ProductController@edit')->name('admin.editProduct');
	Route::post('updateProduct','ProductController@update')->name('admin.updateProduct');
	Route::get('deleteProduct/{id}', 'ProductController@delete')->name('admin.deleteProduct');

	//slider routes
	Route::get('sliderDetails','SliderController@index')->name('admin.sliderDetails');
	Route::post('sliderStore','SliderController@store')->name('admin.sliderStore');
	Route::get('editSlider/{id}','SliderController@edit')->name('admin.editSlider');
	Route::post('updateSlider','SliderController@update')->name('admin.updateSlider');
	Route::get('deleteSlider/{id}','SliderController@delete')->name('admin.deleteSlider');


	//newscategory routes
	Route::get('newscategoryDetails','NewscategoryController@index')->name('admin.newscategoryDetails');
	Route::post('newscategoryStore','NewscategoryController@store')->name('admin.newscategoryStore');
	Route::get('editnewsCategory/{id}','NewscategoryController@edit')->name('admin.editnewsCategory');
	Route::post('updatenewsCategory','NewscategoryController@update')->name('admin.updatenewsCategory');
	Route::get('deletenewsCategory/{id}','NewscategoryController@delete')->name('admin.deletenewsCategory');
	Route::get('sortingNewscategory','NewscategoryController@sortingView')->name('admin.sortingNewscategory');
	Route::post('sortNewscategory','NewscategoryController@sortingUpdate')->name('admin.sortNewscategoryUpdate');

	//news routes
	Route::get('newsDetails/{category?}','NewsController@index')->name('admin.newsDetails');
	Route::post('newsStore','NewsController@store')->name('admin.newsStore');
	Route::get('editNews/{id}','NewsController@edit')->name('admin.editNews');
	Route::post('updateNews','NewsController@update')->name('admin.updateNews');
	Route::get('deleteNews/{id}','NewsController@delete')->name('admin.deleteNews');
	Route::get('breakingNews/{id}','NewsController@breaking');
	Route::post('updateBreaking','NewsController@updateBreaking')->name('updateBreaking');
	//blog routes
	Route::get('blogDetails','BlogController@index')->name('admin.blogDetails');
	Route::post('blogStore','BlogController@store')->name('admin.blogStore');
	Route::get('editBlog/{id}','BlogController@edit')->name('admin.editBlog');
	Route::post('updateBlog','BlogController@update')->name('admin.updateBlog');
	Route::get('deleteBlog/{id}','BlogController@delete')->name('admin.deleteBlog');	//sitesetting route
	Route::get('sitesetting','SiteController@index')->name('admin.sitesetting');
	Route::post('sitesettingUpdate','SiteController@update')->name('admin.sitesettingUpdate');
	//audio category route
	Route::get('audiocategoryDetails','AudiocategoryController@index')->name('admin.audiocategoryDetails');
	Route::post('audiocategoryStore','AudiocategoryController@store')->name('admin.audiocategoryStore');
	Route::get('editaudiocategory/{id}','AudiocategoryController@edit')->name('admin.editaudiocategory');
	Route::post('updateaudioCategory','AudiocategoryController@update')->name('admin.updateaudioCategory');
	Route::get('deleteaudioCategory/{id}','AudiocategoryController@delete')->name('admin.deleteaudioCategory');
	Route::get('sortingAudiocategory','AudiocategoryController@sortingView')->name('admin.sortingAudiocategory');
	Route::post('sortAudiocategory','AudiocategoryController@sortingUpdate')->name('admin.sortAudiocategoryUpdate');
	//audio routes
	Route::get('audioDetails','AudioController@index')->name('admin.audioDetails');
	Route::post('audioStore','AudioController@store')->name('admin.audioStore');
	Route::get('editAudio/{id}','AudioController@edit')->name('admin.editAudio');
	Route::post('updateAudio','AudioController@update')->name('admin.updateAudio');
	Route::get('deleteAudio/{id}','AudioController@delete')->name('admin.deleteAudio');


	Route::get('advertisementDetails','AdvertisementController@index')->name('admin.advertisementDetails');
	Route::post('advertisementStore','AdvertisementController@store')->name('admin.advertisementStore');
	Route::get('editAdvertisement/{id}','AdvertisementController@edit');
	Route::post('updateAdvertisement','AdvertisementController@update')->name('admin.updateAdvertisement');
    Route::get('deleteAvertisement/{id}','AdvertisementController@delete');

    Route::get('paymentDetails','PaymentController@index')->name('admin.payment');
    
    Route::get('customerDetails','IndexController@customer')->name('admin.customerDetails');
    Route::get('uniquevisitor','ChartController@uniqueView')->name('admin.uniqueVisitor');
    Route::post('uniqueGraph','ChartController@uniqueChartView')->name('admin.uniqueGraph');
});

Auth::routes();
