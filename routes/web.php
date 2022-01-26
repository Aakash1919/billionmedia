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


Auth::routes();

/**
 * Public Routes
 */
Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('public.home');
Route::get('/features', [App\Http\Controllers\PublicController::class, 'features'])->name('public.features');
Route::get('/solutions', [App\Http\Controllers\PublicController::class, 'solutions'])->name('public.solutions');
Route::get('/free-seo-tool', [App\Http\Controllers\PublicController::class, 'freeSeoTool'])->name('public.freeSeoTool');
Route::get('/plan-and-pricing', [App\Http\Controllers\PublicController::class, 'pricing'])->name('public.pricing');
Route::get('/blogs', [App\Http\Controllers\PublicController::class, 'blogs'])->name('public.blogs');
Route::get('/keyword-tool', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'publicPlanner'])->name('public.keyword-planner');
Route::post('/keyword-tool', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'publicPlanner'])->name('public.keyword-planner-post');


/**
 * User routes
 */
Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->middleware('auth')->name('home');
Route::get('/google-authorize', [App\Http\Controllers\GoogleAds\GoogleAuthenticate::class, 'main'])->middleware('auth')->name('google-authorize');
Route::get('/keyword-planner', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'index'])->middleware('auth')->name('keyword-planner');
Route::post('/keyword-planner', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'main'])->middleware('auth')->name('keyword-planner-post');
Route::get('/rank-tracking', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'positionTracking'])->middleware('auth')->name('rank-tracking');
Route::get('/create-your-project', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'createProject'])->middleware('auth')->name('create-project');

