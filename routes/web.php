<?php
namespace App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::post('/whisps', [WhispsController::class, 'store']);

    Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

    Route::get(
        '/whisps',
        [WhispsController::class, 'index'])
        ->name('home');

    Route::get(
        '/profiles/{user:username}/edit',
        [ProfilesController::class, 'edit'])
        ->middleware('can:edit,user');

    Route::post(
        '/profiles/{user:username}/follow',
        [FollowsController::class, 'store'])
        ->name('follow');

    Route::patch(
        '/profiles/{user:username}',
        [ProfilesController::class, 'update'])
        ->middleware('can:edit,user');

    Route::get('/explore', ExploreController::class);

    Route::post(
        '/whisps/{whisp}/like',
        [WhispLikesController::class, 'store']);

    Route::delete(
        '/whisps/{whisp}/like',
        [WhispLikesController::class, 'destroy']);
});

Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])->name('profile');

Auth::routes();
