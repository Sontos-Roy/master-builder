<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\backend\homeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\footerBarController;
use App\Http\Controllers\footerMainController;
use App\Http\Controllers\frontend\about\AboutShortSectionController;
use App\Http\Controllers\frontend\about\CoreValuesController;
use App\Http\Controllers\frontend\about\ManagementController;
use App\Http\Controllers\frontend\about\StorySliderController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\frontend\headerController;
use App\Http\Controllers\frontend\home\brandImageController;
use App\Http\Controllers\frontend\home\DesignsController;
use App\Http\Controllers\frontend\home\flatDesignController;
use App\Http\Controllers\frontend\home\HomeGalleryController;
use App\Http\Controllers\frontend\home\HomeSliderController;
use App\Http\Controllers\frontend\home\personSpeechController;
use App\Http\Controllers\frontend\home\progressCounterController;
use App\Http\Controllers\frontend\media\MediaController;
use App\Http\Controllers\frontend\projectController;
use App\Http\Controllers\frontend\sections\frontpagesecController;
use App\Http\Controllers\frontend\sections\OtherSectionController;
use App\Http\Controllers\frontend\sections\ProjectSectionController;
use App\Http\Controllers\frontend\userinputs\InvitationController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// backend

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [homeController::class, 'index'])->name('admin');
    Route::resource('/admin/coversection', frontpagesecController::class);
    Route::resource('/admin/progress', progressCounterController::class);
    Route::resource('/admin/brandimage', brandImageController::class);
    Route::resource('/admin/project', projectController::class);
    Route::resource('/admin/person_quat', personSpeechController::class);
    Route::resource('/admin/other_sec', OtherSectionController::class);
    Route::resource('/admin/invitation', InvitationController::class);
    Route::post('/admin/invitation/multidelete', [InvitationController::class, 'del'])->name('invite.del');
    Route::resource('/admin/home_slider', HomeSliderController::class);
    Route::resource('/admin/home_gallery', HomeGalleryController::class);
    Route::resource('/admin/flat_sec', flatDesignController::class);
    Route::resource('/admin/design_sec', DesignsController::class);
    Route::resource('/admin/header', headerController::class);
    Route::resource('/admin/footer', footerBarController::class);
    Route::resource('/admin/footer_main', footerMainController::class);
    Route::resource('/admin/social', SocialMediaController::class);
    Route::resource('/admin/aboutshortsec', AboutShortSectionController::class);
    Route::resource('/admin/corevalues', CoreValuesController::class);
    Route::resource('/admin/story_slider', StorySliderController::class);
    Route::post('/admin/story_slider/multidelete', [StorySliderController::class, 'multidelete'])->name('story_slider.multidelete');
    Route::resource('/admin/management', ManagementController::class);
    Route::resource('/admin/media', MediaController::class);
    Route::resource('/admin/contact', ContactController::class);
    Route::post('/admin/contact/multidelete', [ContactController::class, 'multidelete'])->name('contact.multidelete');
    Route::resource('/admin/profile', ProfileController::class);
    Route::get('/admin/profile/change/{id}', [ProfileController::class, 'change'])->name('change-password');
    Route::post('/admin/profile/password', [ProfileController::class, 'password'])->name('profile.password');
});

// backend
Route::get("clear", function(){
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');

    dd("All Clear");
});


Route::get('/', [frontendController::class, 'index'])->name('index');
Route::get('/about', [frontendController::class, 'about'])->name('about');
Route::get('/properties', [frontendController::class, 'properties'])->name('properties');
Route::get('/media', [frontendController::class, 'media'])->name('media');
Route::get('/contact', [frontendController::class, 'contact'])->name('contact');
Route::get('/message', [frontendController::class, 'message'])->name('message');
