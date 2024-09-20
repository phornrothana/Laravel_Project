<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminUser;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Backend\AdminMessage;
use App\Http\Controllers\Backend\AdminService;
use App\Http\Controllers\Backend\AdminCategory;
use App\Http\Controllers\Backend\AdminBlockImage;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\AdminTestimonnail;
use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\Backend\AdminInformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/',[FrontendHomeController::class,'HomePage'])->name('frontend.HomePage');
Route::get('/frontend/blog-detail/{id}-{slug}',[FrontendHomeController::class,'BlogDetail'])->name('frontend.blog.detail');
Route::get('/frontend/services',[FrontendHomeController::class,'service'])->name('frontend.service');
Route::get('/frontend/contact',[FrontendHomeController::class,'contact'])->name('frontend.contact');
Route::post('/frontend/contact-store',[FrontendHomeController::class,'contactStore'])->name('frontend.contact.store');
Route::get('/frontend/category/{id}',[FrontendHomeController::class,'category'])->name('frontend.category');


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(DemoController::class)->group(function(){
    Route::get('/about','index')->name('page.about');
    Route::get('/contact','contact')->name('page.contact');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/view-profile','ViewProfile')->name('admin.view.profile');
    Route::get('/admin/edit-profile','editProfile')->name('admin.edit.profile');
    Route::post('/admin/update-profile','updateProfile')->name('admin.update.profile');
    Route::get('/admin/change-password','changePassword')->name('admin.change.password');
    Route::post('/admin/update-password','updatePassword')->name('admin.update.password');

});
Route::controller(AdminInformationController::class)->group(function(){
    Route::get("admin/Home","index")->name("admin.Home");
    Route::post("admin/store/Home","store")->name("admin.store.Home");
});
Route::controller(AdminBlockImage::class)->group(function(){
    Route::get("admin/blog-image","index")->name("admin.blog.image");
    Route::get("admin/blog-create","create")->name("admin.blog.image.create");
    Route::post("admin/blog-image-store","store")->name("admin.store.image");
    Route::get('/admin/blog-edit-image/{id}','editBlogImage')->name('admin.blog.edit');
    Route::post('/admin/blog-update-image','updateBlogImage')->name('admin.blog.update');
    Route::get('/admin/blog-image-inactive/{id}','BlogInActive')->name('admin.blog.inactive');
    Route::get('/admin/blog-image-active/{id}','BlogActive')->name('admin.blog.active');

    Route::get('/admin/blog-detail-edit/{id}','editBlogImageDetail')->name('admin.blog.detail');
    Route::post('/admin/blog-update-detail','updateDetail')->name('admin.update.detail');
});
//service
Route::controller(AdminService::class)->group(function(){
    Route::get("admin/service","index")->name("admin.service.index");
    Route::get("admin/service-create","create")->name("admin.service.create");
    Route::post("admin/service-store","store")->name("admin.service.store");
    Route::get('/admin/service-edit/{id}','Edit')->name('admin.service.edit');
    Route::post('/admin/service-update','Update')->name('admin.service.update');

    Route::get('/admin/service-inactive/{id}','InActive')->name('admin.service.inactive');
    Route::get('/admin/service-active/{id}','Active')->name('admin.service.active');

});

Route::controller(FooterController::class)->group(function(){
    Route::get("admin/Footer","index")->name("admin.Footer");
    Route::post("admin/store/Footer","store")->name("admin.store.Footer");
});

Route::controller(AdminTestimonnail::class)->group(function(){
    Route::get("admin/Testimonial","index")->name("admin.testimonial.index");
    Route::get("admin/Testimonial-create","create")->name("admin.testimonial.create");
    Route::post("admin/Testimonial-store","store")->name("admin.store.testimonial");

    Route::get('/admin/Testimonial-edit/{id}','Edit')->name('admin.testimonial.edit');
    Route::post('/admin/Testimonial-update','Update')->name('admin.testimonial.update');

    Route::get('/admin/testimonial-inactive/{id}','InActive')->name('admin.testimonial.inactive');
    Route::get('/admin/testimonial-active/{id}','Active')->name('admin.testimonial.active');


});

Route::controller(AdminMessage::class)->group(function(){
    Route::get("admin/Contact","index")->name("admin.contact.message");
    Route::get('/admin/Message-view/{id}','ViewDetail')->name('admin.message.view');


});

Route::controller(AdminCategory::class)->group(function(){
    Route::get("admin/Category","index")->name("admin.category.index");

    // Route::get('/admin/Message-view/{id}','ViewDetail')->name('admin.message.view');
    Route::get("admin/category-create","create")->name("admin.category.create");
    Route::post("admin/Category-store","store")->name("admin.store.category");


    Route::get('/admin/Category-edit/{id}','Edit')->name('admin.category.edit');
    Route::post('/admin/Category-update','Update')->name('admin.category.update');

    Route::get('/admin/Category-inactive/{id}','InActive')->name('admin.category.inactive');
    Route::get('/admin/Category-active/{id}','Active')->name('admin.category.active');

    Route::post("admin/Category-detail-store","detailStore")->name("admin.store.category.detail");

});

// Route::controller(AdminUser::class)->group(function(){
//     Route::get("admin/User","index")->name("admin.user");
//     Route::get("admin/User/Create","create")->name("admin.user.create");
//     Route::post("admin/User/Store","store")->name("admin.user.store");


// });


Route::controller(AdminUser::class)->group(function() {
    Route::get("admin/user", "index")->name("admin.user.index");
    Route::get("admin/user/create", "create")->name("admin.user.create");
    Route::post("admin/user/store", "store")->name("admin.user.store");

    Route::get("admin/user/edit/{id}", "edit")->name("admin.user.edit");
    Route::post("admin/user/update", "update")->name("admin.user.update");
});
require __DIR__.'/auth.php';

