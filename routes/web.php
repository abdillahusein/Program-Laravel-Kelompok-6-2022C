<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk UserController
Route::get('/users', [UserController::class, 'index'])->name('Users.index');
Route::get('/users/{id}', [UserController::class, 'get'])->name('Users.get');
Route::get('/register', [UserController::class, 'registerForm'])->name('User.registerForm');
Route::post('/register', [UserController::class, 'register'])->name('User.register');
Route::get('/login', [UserController::class, 'loginForm'])->name('User.loginForm');
Route::post('/login', [UserController::class, 'login'])->name('User.login');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('Users.edit');// Rute untuk menampilkan formulir edit pengguna
Route::put('/users/{id}', [UserController::class, 'update'])->name('Users.update'); // Rute untuk memproses permintaan update pengguna
Route::delete('/logout', [UserController::class, 'logout'])->name('logout');


// Routes untuk ContactController
Route::get('/contacts', [ContactController::class, 'index'])->name('Contacts.index'); // Menampilkan daftar kontak
Route::get('/contacts/create', [ContactController::class, 'createForm'])->name('Contacts.createForm'); // Menampilkan form untuk membuat kontak baru
Route::post('/contacts/create', [ContactController::class, 'create'])->name('Contacts.create'); // Menyimpan kontak yang baru dibuat
Route::get('/contacts/{contact}/edit', [ContactController::class, 'updateForm'])->name('Contacts.updateForm'); // Menampilkan form untuk mengedit kontak
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('Contacts.update'); // Memperbarui kontak yang ada
Route::get('/contacts/{contact}', [ContactController::class, 'get'])->name('Contacts.get'); // Menampilkan detail dari kontak tertentu
Route::get('/search', [ContactController::class, 'search'])->name('Contacts.search'); // Menampilkan kontak yang sesuai dengan pencarian
Route::delete('/contacts/{contact}', [ContactController::class, 'delete'])->name('Contacts.delete'); // Menghapus kontak tertentu


// Routes untuk AddressController
Route::get('/addresses', [AddressController::class, 'index'])->name('Addresses.index'); // Route untuk menampilkan semua alamat
Route::get('/addresses/create', [AddressController::class, 'createForm'])->name('Addresses.createForm'); // Route untuk menampilkan formulir pembuatan alamat baru
Route::post('/addresses/create', [AddressController::class, 'create'])->name('Addresses.create'); // Route untuk menyimpan alamat baru ke dalam database
Route::get('/addresses/{address}/edit', [AddressController::class, 'updateForm'])->name('Addresses.updateForm'); // Route untuk menampilkan formulir update alamat
Route::put('/addresses/{address}', [AddressController::class, 'update'])->name('Addresses.update'); // Route untuk memperbarui alamat dalam database
Route::get('/addresses/{address}', [AddressController::class, 'get'])->name('Addresses.get'); // Route untuk menampilkan detail alamat
Route::delete('/addresses/{address}', [AddressController::class, 'delete'])->name('Addresses.delete'); // Route untuk menghapus alamat dari database