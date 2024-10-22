<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\Front\ContactController as FrontContactController;
use App\Http\Controllers\Front\PagesController as FrontPagesController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Auth Route start
Route::get('/admin/login', [AdminAuthController::class, 'loginGet'])->name('admin.login.get');
Route::post('/admin/login/save', [AdminAuthController::class, 'loginSave'])->name('admin.login.save');

Route::get('/admin/password/forgot', [AdminAuthController::class, 'passwordForgotGet'])->name('admin.password.forgot.get');
Route::post('admin/password/forgot/save', [AdminAuthController::class, 'passwordForgotSave'])->name('admin.password.forgot.save');

Route::get('/admin/password/reset/{token}', [AdminAuthController::class, 'passwordResetGet'])->name('admin.password.reset.get');
Route::post('/admin/password/reset/save', [AdminAuthController::class, 'passwordResetSave'])->name('admin.password.reset.save');
// Admin Auth Route end

// Admin route start
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'is_admin'], function () {

    // dashboard route start
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    // dashboard route end

    // profile setting Modlue start
    Route::get('/profile/setting/password', [AdminProfileController::class, 'profileSettingsPasswordIndex'])->name('admin.profile.settings.password.index');
    Route::post('/profile/setting/password/save', [AdminProfileController::class, 'profileSettingsPasswordSave'])->name('admin.profile.settings.password.save');

    Route::get('/profile/setting', [AdminProfileController::class, 'profileSettingIndex'])->name('admin.profile.setting.index');
    Route::post('/profil/esetting/save', [AdminProfileController::class, 'profileSettingSave'])->name('admin.profile.setting.save');
    // profile setting Modlue end

    // contact us msg Modlue start
    Route::get('/contact/messages', [AdminContactController::class, 'index'])->name('admin.contact.messages.index');
    Route::get('/contact/messages/view/{id}', [AdminContactController::class, 'view'])->name('admin.contact.messages.view');
    Route::post('/contact/messages/delete/{id}', [AdminContactController::class, 'delete'])->name('admin.contact.messages.delete');
    // contact us msg Modlue end

    // contact settings Modlue start
    Route::get('/contact/settings', [AdminContactController::class, 'indexContactSettings'])->name('admin.contact.settings.index');
    Route::post('/contact/settings/save', [AdminContactController::class, 'saveContactSettings'])->name('admin.contact.settings.save');
    // contact settings Modlue end

    // site settings Modlue start
    Route::get('/site/settings', [AdminSiteSettingController::class, 'index'])->name('admin.site.settings.index');
    Route::post('/site/settings/save', [AdminSiteSettingController::class, 'save'])->name('admin.site.settings.save');
    // site settings Modlue end

    // category Modlue start
    Route::any('/categorys', [AdminCategoryController::class, 'index'])->name('admin.categorys.index');
    Route::get('/categorys/create', [AdminCategoryController::class, 'create'])->name('admin.categorys.create');
    Route::post('/categorys/save', [AdminCategoryController::class, 'save'])->name('admin.categorys.save');
    Route::get('/categorys/view/{id}', [AdminCategoryController::class, 'view'])->name('admin.categorys.view');
    Route::get('/categorys/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.categorys.edit');
    Route::put('/categorys/update', [AdminCategoryController::class, 'update'])->name('admin.categorys.update');
    Route::post('/categorys/status/toggle', [AdminCategoryController::class, 'statusToggle'])->name('admin.categorys.status.toggle');
    Route::post('/categorys/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.categorys.delete');
    // category Modlue end

    // category Modlue start
    Route::any('/categorys', [AdminCategoryController::class, 'index'])->name('admin.categorys.index');
    Route::get('/categorys/create', [AdminCategoryController::class, 'create'])->name('admin.categorys.create');
    Route::post('/categorys/save', [AdminCategoryController::class, 'save'])->name('admin.categorys.save');
    Route::get('/categorys/view/{id}', [AdminCategoryController::class, 'view'])->name('admin.categorys.view');
    Route::get('/categorys/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.categorys.edit');
    Route::put('/categorys/update', [AdminCategoryController::class, 'update'])->name('admin.categorys.update');
    Route::post('/categorys/status/toggle', [AdminCategoryController::class, 'statusToggle'])->name('admin.categorys.status.toggle');
    Route::post('/categorys/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.categorys.delete');
    // category Modlue end

    // Blogs Modlue start
    Route::any('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news/save', [AdminNewsController::class, 'save'])->name('admin.news.save');
    Route::get('/news/view/{id}', [AdminNewsController::class, 'view'])->name('admin.news.view');
    Route::get('/news/edit/{id}', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/update', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::post('/news/status/toggle', [AdminNewsController::class, 'statusToggle'])->name('admin.news.status.toggle');
    Route::post('/news/delete/{id}', [AdminNewsController::class, 'delete'])->name('admin.news.delete');
    Route::any('/news/cat/{id}', [AdminNewsController::class, 'catIndex'])->name('admin.news.cat-index');
    // Blogs Modlue end
});
// Admin route end

Route::group(['namespace' => 'Front'], function () {

    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('front.home');
    Route::get('/', [FrontPagesController::class, 'home'])->name('front.home');

    Route::get('/news-details/{slug}', [FrontPagesController::class, 'newsDetails'])->name('front.news.details');
    Route::get('/category/{slug}', [FrontPagesController::class, 'newsCatList'])->name('front.news.category.list');
});
