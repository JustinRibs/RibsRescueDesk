<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Ticket ROUTES
// All tickets (filters)
Route::get('/', [TicketController::class, 'index']);

// Get Users tickets
Route::get('/user/tickets/{id}', [TicketController::class, 'index']);

// Show Create Form
Route::get('/ticket/create', [TicketController::class, 'create'])->middleware('auth');

// Show edit Form
Route::get('/ticket/edit/{ticket}', [TicketController::class, 'edit'])->middleware('auth');

// Show a ticket
Route::get('/ticket/{ticket}', [TicketController::class, 'show']);

// Store new Ticket
Route::post('/ticket/create', [TicketController::class, 'store'])->middleware('auth');

// Update ticket
Route::post('/ticket/update/{ticket}', [TicketController::class, 'update'])->middleware('auth');

// USER ROUTES

// Show login page
Route::get('/users/login', [UserController::class, 'show'])->name('login');

// authenticate user/login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// logout user
Route::post('users/logout', [UserController::class, 'logout'])->middleware('auth');

// Show register page
Route::get('/users/register', [UserController::class, 'create']);

// Store new user
Route::post('/users/register', [UserController::class, 'store']);


// COMMENT ROUTES

Route::post('/comments/{ticket}', [CommentController::class, 'store']);

Route::get('/tomrod', function () {
    return view('tomrod');
});
