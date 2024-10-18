<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CareerMessageController as AdminCareerMessageController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;
use App\Http\Controllers\Admin\NewsletterMailController as AdminNewsletterMailController;
use App\Http\Controllers\Admin\HomeSliderController as AdminHomeSliderController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

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

    // contact us msg Modlue start
    Route::get('/newsletters', [AdminNewsletterController::class, 'index'])->name('admin.newsletters.index');
    Route::post('/newsletters/delete/{id}', [AdminNewsletterController::class, 'delete'])->name('admin.newsletters.delete');
    Route::post('/newsletters/status/toggle', [AdminNewsletterController::class, 'statusToggle'])->name('admin.newsletters.status.toggle');
    // contact us msg Modlue end

    // newslettermails Modlue start
    Route::any('/newslettermails', [AdminNewsletterMailController::class, 'index'])->name('admin.newslettermails.index');
    Route::get('/newslettermails/create', [AdminNewsletterMailController::class, 'create'])->name('admin.newslettermails.create');
    Route::post('/newslettermails/save', [AdminNewsletterMailController::class, 'save'])->name('admin.newslettermails.save');
    Route::get('/newslettermails/view/{id}', [AdminNewsletterMailController::class, 'view'])->name('admin.newslettermails.view');
    Route::get('/newslettermails/edit/{id}', [AdminNewsletterMailController::class, 'edit'])->name('admin.newslettermails.edit');
    Route::put('/newslettermails/update', [AdminNewsletterMailController::class, 'update'])->name('admin.newslettermails.update');
    Route::post('/newslettermails/delete/{id}', [AdminNewsletterMailController::class, 'delete'])->name('admin.newslettermails.delete');
    Route::get('/newslettermails/sendmail/{id}', [AdminNewsletterMailController::class, 'sendmail'])->name('admin.newslettermails.sendmail');
    // newslettermails Modlue end


    // homeslider Modlue start
    Route::any('/homeslider', [AdminHomeSliderController::class, 'index'])->name('admin.homeslider.index');
    Route::get('/homeslider/create', [AdminHomeSliderController::class, 'create'])->name('admin.homeslider.create');
    Route::post('/homeslider/save', [AdminHomeSliderController::class, 'save'])->name('admin.homeslider.save');
    Route::get('/homeslider/view/{id}', [AdminHomeSliderController::class, 'view'])->name('admin.homeslider.view');
    Route::get('/homeslider/edit/{id}', [AdminHomeSliderController::class, 'edit'])->name('admin.homeslider.edit');
    Route::put('/homeslider/update', [AdminHomeSliderController::class, 'update'])->name('admin.homeslider.update');
    Route::post('/homeslider/status/toggle', [AdminHomeSliderController::class, 'statusToggle'])->name('admin.homeslider.status.toggle');
    Route::post('/homeslider/delete/{id}', [AdminHomeSliderController::class, 'delete'])->name('admin.homeslider.delete');
    // homeslider Modlue end

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

     // Projects Modlue start
     Route::any('/Projects', [AdminProjectController::class, 'index'])->name('admin.Projects.index');
     Route::get('/Projects/create', [AdminProjectController::class, 'create'])->name('admin.Projects.create');
     Route::post('/Projects/save', [AdminProjectController::class, 'save'])->name('admin.Projects.save');
     Route::get('/Projects/view/{id}', [AdminProjectController::class, 'view'])->name('admin.Projects.view');
     Route::get('/Projects/edit/{id}', [AdminProjectController::class, 'edit'])->name('admin.Projects.edit');
     Route::put('/Projects/update', [AdminProjectController::class, 'update'])->name('admin.Projects.update');
     Route::post('/Projects/status/toggle', [AdminProjectController::class, 'statusToggle'])->name('admin.Projects.status.toggle');
     Route::post('/Projects/delete/{id}', [AdminProjectController::class, 'delete'])->name('admin.Projects.delete');
     Route::post('/Projects/image/delete/exterior', [AdminProjectController::class, 'exteriorImageDelete'])->name('admin.Projects.image.delete.exterior');
     Route::post('/Projects/image/delete/interior', [AdminProjectController::class, 'interiorImageDelete'])->name('admin.Projects.image.delete.interior');
     // Projects Modlue end

      // career us msg Modlue start
    Route::get('/career/messages', [AdminCareerMessageController::class, 'index'])->name('admin.career.messages.index');
    Route::get('/career/messages/view/{id}', [AdminCareerMessageController::class, 'view'])->name('admin.career.messages.view');
    Route::post('/career/messages/delete/{id}', [AdminCareerMessageController::class, 'delete'])->name('admin.career.messages.delete');
    // career us msg Modlue end
});
// Admin route end

Route::group(['namespace' => 'Front'], function () {

    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('front.home');
    Route::get('/', [FrontPagesController::class, 'home'])->name('front.home');
    Route::get('/about', [FrontPagesController::class, 'about'])->name('front.about');
    Route::get('/privacy_policy', [FrontPagesController::class, 'privacy_policy'])->name('front.privacy_policy');
    Route::get('/term_and_condition', [FrontPagesController::class, 'term_and_condition'])->name('front.term_and_condition');

    Route::get('/contact', [FrontContactController::class, 'contact'])->name('front.contact');
    Route::post('/contact/message/save', [FrontContactController::class, 'contactMessageSave'])->name('front.contact.message.save');

    Route::get('/career', [FrontContactController::class, 'career'])->name('front.career');
    Route::post('/career/message/save', [FrontContactController::class, 'careerMessageSave'])->name('front.career.message.save');

    Route::post('/newsletter/save', [FrontPagesController::class, 'newsletterSave'])->name('front.newsletter.save');
    Route::get('/newsletter/unsubscribe/{email}', [FrontPagesController::class, 'newsletterUnSubscribe'])->name('front.newsletter.unsubscribe');

    Route::get('/project-details/{id}', [FrontPagesController::class, 'projectDetails'])->name('front.project.details');
    Route::get('/project-details-arvr/{id}', [FrontPagesController::class, 'projectDetailsArVr'])->name('front.project.details.arvr');
});
