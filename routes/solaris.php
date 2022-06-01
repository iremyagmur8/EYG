<?php

use App\Http\Controllers\SolarisController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideogalleryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;

Route::get('solaris/login',[SolarisController::class,'login'])->name('solarislogin');


Route::get('solaris',[SolarisController::class,'index'])->middleware('solarisauth')->name('solaris');
Route::post('solaris/addproduct',[ProductController::class,'store'])->middleware('auth');
Route::get('solaris/products/edit/{id}',[ProductController::class,'edit'])->middleware('auth');
Route::get('solaris/add/products',[ProductController::class,'create'])->middleware('auth');
Route::get('solaris/products',[ProductController::class,'index'])->middleware('auth');

Route::post('solaris/addpost',[PostController::class,'store'])->middleware('auth');
Route::get('solaris/posts/edit/{id}',[PostController::class,'edit'])->middleware('auth');
Route::get('solaris/add/posts',[PostController::class,'create'])->middleware('auth');
Route::get('solaris/posts',[PostController::class,'index'])->middleware('auth');

Route::get('solaris/galleries',[GalleryController::class,'index'])->middleware('auth');
Route::get('solaris/add/galleries',[GalleryController::class,'create'])->middleware('auth');
Route::post('solaris/addgalleries',[GalleryController::class,'store'])->middleware('auth');
Route::get('solaris/galleries/edit/{id}',[GalleryController::class,'edit'])->middleware('auth');

Route::get('solaris/videogalleries',[VideogalleryController::class,'index'])->middleware('auth');
Route::get('solaris/add/videogalleries',[VideogalleryController::class,'create'])->middleware('auth');
Route::post('solaris/addvideogalleries',[VideogalleryController::class,'store'])->middleware('auth');
Route::get('solaris/videogalleries/edit/{id}',[VideogalleryController::class,'edit'])->middleware('auth');

Route::get('solaris/banners',[BannerController::class,'index'])->middleware('auth');
Route::get('solaris/add/banners',[BannerController::class,'create'])->middleware('auth');
Route::post('solaris/addbanners',[BannerController::class,'store'])->middleware('auth');
Route::get('solaris/banners/edit/{id}',[BannerController::class,'edit'])->middleware('auth');

Route::get('solaris/contact',[ContactController::class,'index'])->middleware('auth');
Route::get('solaris/add/contact',[ContactController::class,'create'])->middleware('auth');
Route::post('solaris/addcontact',[ContactController::class,'store'])->middleware('auth');
Route::get('solaris/contact/edit/{id}',[ContactController::class,'edit'])->middleware('auth');

Route::get('solaris/categories',[CategoryController::class,'index'])->middleware('auth');
Route::get('solaris/categories/edit/{id}',[CategoryController::class,'edit'])->middleware('auth');
Route::post('ckeditor/image_upload', [CKEditorController::class,'upload'])->middleware('auth')->name('ckupload');
Route::post('/solaris/categories',[CategoryController::class,'addCategory'])->middleware('auth');
Route::get('solaris/{module}/edit/{id}',[CategoryController::class,'edit'])->middleware('auth');
Route::post('solaris/deletefile',[\App\Http\Controllers\FilesController::class,'delete'])->middleware('auth');
Route::post('solaris/subCats',[\App\Http\Controllers\AjaxController::class,'subCats'])->middleware('auth');
Route::post('ajax-remove', [AjaxController::class, 'destroy'])->middleware('auth')->name('destroy');

Route::post('solaris/sortfiles',[\App\Http\Controllers\FilesController::class,'sort'])->middleware('auth');
