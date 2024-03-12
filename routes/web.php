<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyController;
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
    return view('auth.register');
})->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('login.user');
 Route::get('/register', [AuthController::class, 'register'])->name('register');
 Route::post('store', [AuthController::class, 'store'])->name('register.store');
 Route::get('/verify/{token}', [VerifyController::class,'VerifyEmail'])->name('verify');
 Route::get('/forgot',[PasswordController::class,'show'])->name('forget.password');
 Route::post('/submit-forgot',[PasswordController::class,'store'])->name('store.forgot.password');
 Route::get('/password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
 Route::post('/password/reset', [PasswordController::class, 'reset'])->name('password.update');
 Route::get('/email/verify/{id}', [VerifyController::class, 'virefyAccount'])->name('verification.verify');

// users gestion
 Route::get('/admin-getUsers', [UserController::class, 'getUsers'])->name('admin.getUsers')->middleware('role:admin');
 Route::put('/update.an.user/{id}' , [UserController::class, 'updateUser'])->name('update.an.user')->middleware('role:admin');
 Route::get('blocker.user/{id}', [UserController::class, 'blockerUser'])->name('blocker.user')->middleware('role:admin');
 Route::get('unblocker.user/{id}', [UserController::class, 'blockerUser'])->name('unblocker.user')->middleware('role:admin');
 

 Route::get('/show.category',[CategoryController::class,'showCategory'])->name('show.category')->middleware('role:admin');
 Route::post('/store.category',[CategoryController::class,'storeCategory'])->name('store.category')->middleware('role:admin');
Route::get('/delete.category/{id}',[CategoryController::class,'deleteCategory'])->name('delet.category')->middleware('role:admin');
Route::put('/update.category/{id}',[CategoryController::class,'editCategory'])->name('update.category')->middleware('role:admin');

// events route
Route::get('/show.events',[EventController::class,'showEvent'])->name('show.events')->middleware('role:organisateur');
Route::post('/store.event',[EventController::class,'storeEvent'])->name('events.store')->middleware('role:organisateur');
Route::get('/delete.event/{id}',[EventController::class,'deleteEvent'])->name('delete.event')->middleware('role:organisateur');
Route::put('/update.event/{id}',[EventController::class,'editEvent'])->name('events.edit')->middleware('role:organisateur');

Route::get('/show.events.admin',[EventController::class,'showEventAdmin'])->name('show.events.admin')->middleware('role:admin');

route::get('/accept.event.admin/{id}',[EventController::class,'acceptEvent'])->name('accept.event.admin')->middleware('role:admin');
// tickets route

Route::get('/show.tickets/{id}',[TicketController::class,'showTickets'])->name('view.tickit')->middleware('role:organisateur');
Route::post('/store.tickets/{id}',[TicketController::class,'storeTickets'])->name('store.tickets')->middleware('role:organisateur');
Route::get('/delete.tickets/{id}',[TicketController::class,'deleteTicket'])->name('delete.tickets')->middleware('role:organisateur');
Route::put('/update.tickets/{id}',[TicketController::class,'editTicket'])->name('update.ticket')->middleware('role:organisateur');



// statistique

Route::get('/statistique',[StatistiqueController::class,'state'])->name('sattistique.admin')->middleware('role:admin');
Route::get('/statistique.organisateur',[StatistiqueController::class,'state'])->name('sattistique.organisateur')->middleware('role:organisateur');


// home route
Route::get('/home' , [HomeController::class, 'index'])->name('home');
Route::get('/event' , [HomeController::class, 'eventShow'])->name('event');
Route::get('/SearchEvent/{search}/{category}/{date}', [HomeController::class, 'searchEvent'])->name('searchEvent');
Route::get('FilterEvent/{id}', [HomeController::class, 'filterEvent'])->name('filterEvent');
Route::get('SortEvent/{date}', [HomeController::class, 'SortEvent'])->name('SortEvent');
Route::get('/event/{id}', [HomeController::class, 'showEventById'])->name('event.details');



// reservation route
Route::get('/reserver/{type}/{eventId}', [ReservationController::class, 'reserve'])->name('reserver')->middleware('auth');


Route::get('/show.reservation',[ReservationController::class,'myResevation'])->name('myResevations')->middleware('auth');



Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session')->middleware('auth');
Route::get('/success/{id}', 'App\Http\Controllers\StripeController@success')->name('success')->middleware('auth');
Route::get('/cancel', 'App\Http\Controllers\StripeController@cancel')->name('cancel');


Route::get('/export-ticket', [TicketController::class, 'exportTicket'])->name('export.ticket')->middleware('auth');





Route::get('/show.reservations',[ReservationController::class,'showReservations'])->name('show.reservations')->middleware('role:organisateur');
Route::put('/accepter.reservation/{id}',[ReservationController::class,'accepterReservation'])->name('accepter.reservation')->middleware('role:organisateur');