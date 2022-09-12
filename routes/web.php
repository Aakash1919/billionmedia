<?php

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
Route::get('/terms-conditions', [App\Http\Controllers\PublicController::class, 'termsAndCondition'])->name('public.termsandConditions');
Route::get('/privacy-policy', [App\Http\Controllers\PublicController::class, 'privacyPolicy'])->name('public.privacypolicy');
Route::get('/site-audit', [App\Http\Controllers\PublicController::class, 'siteAudit'])->name('public.siteaudit');
Route::get('/keyword-rank', [App\Http\Controllers\PublicController::class, 'keywrdRank'])->name('public.keywordrank');

Route::get('/contact-us', function () {
    return view('public.contactUs');
})->name('public.contactUs');

Route::get('/about-seo-science', function () {
    return view('public.aboutSeoScience');
})->name('public.aboutSeoScience');

Route::get('/blog-details/{slug?}', [App\Http\Controllers\PublicController::class, 'viewBlog'])->name('public.blogDetails');

/**
 * User routes
 */
Route::get('/home', [App\Http\Controllers\User\UserController::class, 'index'])->middleware('auth')->name('home');
Route::get('/google-authorize', [App\Http\Controllers\GoogleAds\GoogleAuthenticate::class, 'main'])->middleware('auth')->name('google-authorize');
Route::get('/keyword-planner', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'index'])->middleware('auth')->name('keyword-planner');
Route::get('/rank-tracking/{id?}', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'rankTracking'])->middleware('auth')->name('rank-tracking-id');
Route::get('/getRank', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'getRank'])->middleware('auth');



/**
 * User Post Routes
 */
Route::post('/keyword-planner', [App\Http\Controllers\GoogleAds\KeywordPlanner::class, 'main'])->middleware('auth')->name('keyword-planner-post');
Route::post('/add-project', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'saveProject'])->middleware('auth')->name('save-project');
Route::post('/add-keywords', [App\Http\Controllers\GoogleAds\PositionTracking::class, 'addKeywords'])->middleware('auth')->name('add-project-keyword');
Route::post('/add-competitor', [App\Http\Controllers\GoogleAds\UserProjectCompetitor::class, 'addCompetitor'])->middleware('auth')->name('add-competitor');;
Route::get('/competitor-tracking/{id?}', [App\Http\Controllers\GoogleAds\UserProjectCompetitor::class, 'view'])->middleware('auth')->name('user.competitorTracking');
Route::get('/delete-competitor/{id?}', [App\Http\Controllers\GoogleAds\UserProjectCompetitor::class, 'deletecompetitor'])->middleware('auth')->name('user.deletecompetitorTracking');
Route::get('/delete-keyword/{id?}', [App\Http\Controllers\GoogleAds\UserProjectCompetitor::class, 'deletekeyword'])->middleware('auth')->name('user.deletekeywordTracking');
Route::get('/delete-project/{id?}', [App\Http\Controllers\GoogleAds\UserProjectCompetitor::class, 'deleteProject'])->middleware('auth')->name('user.deleteProject');

Route::get('/blog', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('user.blog');
Route::get('/blog/view/{id?}', [App\Http\Controllers\Admin\BlogController::class, 'view'])->name('user.viewBlog');
Route::post('/blog/save-blog', [App\Http\Controllers\Admin\BlogController::class, 'save'])->name('save-blog');





