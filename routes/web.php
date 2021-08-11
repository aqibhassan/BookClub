<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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

Route::match(['get','post'],'/',[IndexController::class, 'dashboard']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[IndexController::class, 'dashboard']);

Route::get('autocomplete', [IndexController::class,'autocomplete'])->name('autocomplete');
// Author routes
Route::match(['get','post'],'/admin/add-author',[IndexController::class,'addAuthor']);
Route::match(['get','post'],'/admin/view-authors',[IndexController::class,'viewAuthors']);
Route::match(['get','post'],'/admin/edit-author/{id}',[IndexController::class,'editAuthor']);
Route::match(['get','post'],'/admin/delete-author/{id}',[IndexController::class,'deleteAuthor']);
// Book routes
Route::match(['get','post'],'/admin/add-book',[IndexController::class,'addBook']);
Route::match(['get','post'],'/admin/view-books',[IndexController::class,'viewBooks'])->name('admin.view-books');
Route::match(['get','post'],'/admin/edit-book/{id}',[IndexController::class,'editBook'])->name('admin.edit-book');
Route::match(['get','post'],'/admin/delete-book/{id}',[IndexController::class,'deleteBook'])->name('delet.book');
Route::match(['get','post'],'/admin/updatebookstatus/{id}',[IndexController::class,'updatebookstatus']);
Route::match(['get','post'],'/admin/add-images/{id}',[IndexController::class,'addImages']);
Route::get('/admin/delete-alt-image/{id}',[IndexController::class,'deleteAltImage']);