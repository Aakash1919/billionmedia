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
Route::get('/get-countries', [App\Http\Controllers\PublicController::class, 'getCountries'])->name('get-countries');


Route::get('/terms-conditions', function () {
    return view('public.termsandConditions');
})->name('public.termsandConditions');

Route::get('/privacy-policy', function () {
    return view('public.privacypolicy');
})->name('public.privacypolicy');

Route::get('/site-audit', function () {
    return view('public.siteaudit');
})->name('public.siteaudit');

Route::get('/keyword-Rank', function () {
    return view('public.keywordRank');
})->name('public.keywordRank');

Route::get('/blog-details', function () {
    return view('public.blogDetails');
})->name('public.blogDetails');

/**
 * User routes
 */
Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->middleware('auth')->name('home');
Route::get('/google-authorize', [App\Http\Controllers\GoogleAds\GoogleAuthenticate::class, 'main'])->middleware('auth')->name('google-authorize');
Route::get('/keyword-planner', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'index'])->middleware('auth')->name('keyword-planner');
Route::get('/rank-tracking', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'positionTracking'])->middleware('auth')->name('rank-tracking');
Route::get('/rank-tracking/{id?}', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'rankTracking'])->middleware('auth')->name('rank-tracking-id');
Route::get('/getRank', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'getRank'])->middleware('auth');

/**
 * User Post Routes
 */
Route::post('/keyword-planner', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'main'])->middleware('auth')->name('keyword-planner-post');
Route::post('/add-project', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'saveProject'])->middleware('auth')->name('save-project');
Route::post('/add-keywords', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'addKeywords'])->middleware('auth')->name('add-project-keyword');

Route::get('/competitor-tracking', function () {
    return view('user.competitorTracking');
})->name('user.competitorTracking');

Route::get('/blog', function () {
    return view('user.blog');
})->name('user.blog');

