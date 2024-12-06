<?php

use App\Livewire\ArticleCategory;
use App\Livewire\ArticlePage;
use App\Livewire\ArticlePost;
use App\Livewire\CategoryPage;
use App\Livewire\CategoryPost;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

// User
Route::get('/', Home::class)->name('home');
Route::get('/article', ArticlePost::class)->name('article');
Route::get('/article/{article:slug}', ArticlePage::class)->name('article.page');

Route::get('/category', CategoryPost::class)->name('category');
Route::get('/category/{category:id}', CategoryPage::class)->name('category.page');
