<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ContactController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/over_ons', [HomeController::class, 'over_ons']);
Route::get('/privacy', [HomeController::class, 'privacy']);
Route::get('/voorwaarden', [HomeController::class, 'voorwaarden']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);

// Homepage Routes
Route::get('/heren', [HomeController::class, 'heren']);
Route::get('/dames', [HomeController::class, 'dames']);
Route::get('/kids', [HomeController::class, 'kids']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'opslaan']);
Route::get('/alle_producten', [HomeController::class, 'alle_producten']);
Route::get('/product/{slug}', [HomeController::class, 'product']);
// Kart routes
Route::post('/kart/{id}', [HomeController::class, 'kart']);
Route::get('/kart_overzicht', [HomeController::class, 'kart_overzicht']);
Route::get('/verwijder_product/{id}', [HomeController::class, 'verwijder_product']);




// Admin Categorie routes
Route::get('admin/categorie', [App\Http\Controllers\admin\CategorieController::class, 'index']);
Route::get('admin/categorie/toevoegen', [App\Http\Controllers\admin\CategorieController::class, 'toevoegen']);
Route::get('admin/categorie/verwijderen/{id}', [App\Http\Controllers\admin\CategorieController::class, 'verwijderen']);
Route::get('admin/categorie/bewerken/{id}', [App\Http\Controllers\admin\CategorieController::class, 'bewerken']);
Route::post('admin/categorie', [App\Http\Controllers\admin\CategorieController::class, 'opslaan']);
Route::post('admin/categorie/updaten/{id}', [App\Http\Controllers\admin\CategorieController::class, 'updaten']);

// Admin Product routes
Route::get('admin/product', [App\Http\Controllers\admin\ProductController::class, 'index']);
Route::get('admin/product/toevoegen', [App\Http\Controllers\admin\ProductController::class, 'toevoegen']);
Route::post('admin/product', [App\Http\Controllers\admin\ProductController::class, 'opslaan']);
Route::get('admin/product/bewerken/{id}', [App\Http\Controllers\admin\ProductController::class, 'bewerken']);
Route::post('admin/product/updaten/{id}', [App\Http\Controllers\admin\ProductController::class, 'updaten']);
Route::get('admin/product/verwijderen/{id}', [App\Http\Controllers\admin\ProductController::class, 'verwijderen']);

//Admin User Routes
Route::get('admin/users', [App\Http\Controllers\admin\UserController::class, 'users']);
Route::get('admin/users/verwijderen/{id}', [App\Http\Controllers\admin\UserController::class, 'verwijderen']);

//Admin Contact Routes
Route::get('admin/contact', [App\Http\Controllers\admin\ContactController::class, 'berichten']);
Route::get('admin/contact/verwijderen/{id}', [App\Http\Controllers\admin\ContactController::class, 'verwijderen']);
