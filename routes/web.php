<?php


use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','HomeController@index');
Auth::routes();
Route::post('subscriber/store','subscriberController@store')->name('subscriber.store');
Route::get('search', 'searchController@search')->name('search');

Route::get('all/posts', 'postController@index')->name('all.posts');
Route::get('post/{slug}', 'postController@show')->name('single.post');
Route::get('category/{slug}', 'postController@postsByCategory')->name('category.posts');
Route::get('tag/{slug}', 'postController@postsByTag')->name('tag.posts');
Route::get('profile/{username}/author', 'authorPostsController@profile')->name('profile.author');

//route group only for auth
Route::group(['middleware'=>['auth']],function(){
    Route::post('favourite/{post}/add', 'favouriteController@add')->name('favourite.post');
    Route::post('comment/{post}', 'commentController@store')->name('comment.store');
});

// Route Group for Admin
Route::group(['as'=>'admin.', 'prefix'=> 'admin' , 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function(){

    Route::get('home', 'adminDashboardController@home')->name('home');

    Route::get('dashboard', 'adminDashboardController@index')->name('dashboard');

    Route::get('profile/settings', 'profileSettingsController@index')->name('profile.settings');
    Route::put('profile/update', 'profileSettingsController@profileUpdate')->name('profile.update');
    Route::put('password/update', 'profileSettingsController@passwordUpdate')->name('password.update');

    Route::resource('tag', 'tagController');
    Route::resource('category', 'categoryController');

    Route::resource('post', 'postController');
    Route::get('pending/post', 'postController@pending')->name('post.pending');
    Route::put('/post/{id}/approve','postController@approve')->name('post.approve');

    Route::get('favourite/post', 'postController@favouritePost')->name('favourite.post');
    Route::delete('favourite/{post}/remove', 'postController@favouritePostRemove')->name('favourite.post.remove');

    Route::get('comment', 'commentController@index')->name('comment.index');
    Route::delete('comment/{id}', 'commentController@destroy')->name('comment.destroy');

    Route::get('list/authors', 'authorListController@index')->name('list.authors');
    Route::delete('author/{id}/destroy', 'authorListController@destroy')->name('author.destroy');

    Route::get('subscriber', 'subscriberController@index')->name('subscriber.index');
    Route::delete('subscriber/{id}', 'subscriberController@destroy')->name('subscriber.destroy');


});

// Route Group for Author
Route::group(['as'=>'author.', 'prefix'=> 'author' ,'namespace'=>'Author', 'middleware'=>['auth', 'author']], function(){
    Route::get('home','authorDashboardController@home')->name('home');
    Route::get('dashboard','authorDashboardController@index')->name('dashboard');

    Route::get('profile/settings', 'profileSettingsController@index')->name('profile.settings');
    Route::put('profile/update', 'profileSettingsController@profileUpdate')->name('profile.update');
    Route::put('password/update', 'profileSettingsController@passwordUpdate')->name('password.update');

    Route::resource('post', 'postController');

    Route::get('favourite/post', 'postController@favouritePost')->name('favourite.post');
    Route::delete('favourite/{post}/remove', 'postController@favouritePostRemove')->name('favourite.post.remove');

     Route::get('comment', 'commentController@index')->name('comment.index');
     Route::delete('comment/{id}', 'commentController@destroy')->name('comment.destroy');
});






