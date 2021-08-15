<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PostResource;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::post('forgot-password', 'App\Http\Controllers\Api\ForgetPassword@forgot_password');
//Route::post('forgot/password', 'App\Http\Controllers\Api\Auth\ForgotPasswordController')->name('forgot.password');
Route::post('forget','App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::post('password/forgot-password', 'App\Http\Controllers\Api\ForgetPassword@forgotPassword');
//Route::post('password/reset', 'App\Http\Controllers\Api\ResetPasswordController@passwordReset');

Route::get('/user/{id}', function ($id) {
    return new PostResource(User::findOrFail($id));
});

//Route::get('home/{id}', 'App\Http\Controllers\Api\HomeController@index');
Route::middleware('auth:api')-> post('logout','App\Http\Controllers\Api\Logout@logout');
Route:: group (['middleware' => 'auth:api','namespace'=>'App\Http\Controllers\Api'],function(){
    Route::get('user/{user_id?}','UserController@getUser');
    Route::post('user','AddUser@postUser');
    Route::put('user','EditUser@putUser');
    Route::put('post','EditPost@putposts');
    Route::put('user','EditComment@putcomment');
    Route::get('profile/{id?}','Profile@profile');
   Route::post('post','AddPost@postpost');
   Route::post('like','AddLike@postlike');
   Route::get('comment/{user_id?}','UserController@getcomment');
   Route::post('comment','AddComment@postcomment');
   Route::delete('user','DeleteUser@deleteUser');
   Route::get('favourite/{id?}','FavoritePost@favouritePost');
   Route::post('timeline','Timeline@timeline');
  Route::post('home','Home@index');
   //Route::post('home/{id?}','HomeController@home');

});

Route::middleware('auth:api')->group( function (){
    Route::resource('posts','Home');
    Route::get('posts/user/{id}','Api\Home@userPosts');
});
