<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\FormsController;





Route::get('/',[HomepageController::class,'index'])->name('index')->defaults('page', 2);;

Route::get('referanslar',[HomepageController::class,'referanslar'])->name('referanslar')->defaults('page', 7);
Route::get('haberler',[HomepageController::class,'haberler'])->name('haberler');
Route::get('haberler/{category_id}',[HomepageController::class,'haberler'])->name('haberler');
Route::get('haberler/{title}/{id}',[HomepageController::class,'haberDetay']);
Route::get('hakkimizda',[HomepageController::class,'hakkimizda'])->name('hakkimizda')->defaults('page', 3);
Route::get('vizyonumuz',[HomepageController::class,'vizyonumuz']);
Route::get('referanslar',[HomepageController::class,'referanslar']);


Route::get('markalarimiz',[HomepageController::class,'markalarimiz'])->name('hakkimizda')->defaults('page', 4);
Route::get('{title}/{category_id}.htm',[HomepageController::class,'category']);
Route::get('{title}/{id}.html',[HomepageController::class,'post'])->name('post');

Route::get('iletisim',[HomepageController::class,'iletisim'])->name('iletisim')->defaults('page', 5);
Route::post('/iletisim',[HomepageController::class,'mailat']);


require __DIR__.'/auth.php';
require __DIR__.'/solaris.php';
