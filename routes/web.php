<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\AdminController;
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
// ?====================Login=============
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// ?=================Admin Routes======================
Route::post('books/store/{id?}', [BooksController::class, 'store'])->name('books.store');
Route::get('/book-list', [BooksController::class, 'admin'])->name('bookList');
Route::get('/dashboard', [BooksController::class, 'Aitem'])->name('dashboard');
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy');
Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BooksController::class, 'update'])->name('books.update');
Route::get('/search-books', [BooksController::class, 'search'])->name('books.search');
Route::post('/store', [BooksController::class, 'store'])->name('store');
Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.create');
Route::get('/admin.admin', [AdminController::class, 'index'])->name('admin');

// ?====================HomePage==============================
Route::get('/', [BooksController::class, 'index'])->name('home');
Route::get('/new', [BooksController::class, 'newbook'])->name('NewBook');
Route::get('/technology', [BooksController::class, 'technology'])->name('technology');
Route::get('/novel', [BooksController::class, 'novel'])->name('novel');
Route::get('/horror', [BooksController::class, 'horror'])->name('horror');
Route::get('/knowledge', [BooksController::class, 'knowledge'])->name('knowledge');
Route::get('/mystery', [BooksController::class, 'mystery'])->name('mystery');
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
Route::get('/search', [BooksController::class, 'searchs'])->name('books.search');




Route::get('/about-us', function () {
    return view('admin.aboutUs');
})->name('aboutUs');

Route::get('/Detail', function () {
    return view('layouts.ShowItem');
})->name('Detail');
