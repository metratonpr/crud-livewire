<?php

use App\Models\Domain\Contact\Contact;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sandbox', function () {
    dd(Contact::all());
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/contacts', fn () => view('contacts.index'))->name('contacts.index');
});
