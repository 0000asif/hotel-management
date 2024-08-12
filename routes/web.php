<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     $room = room::get();
//     return view('home.index',compact('room'));
// });
Route::get('/',[AdminController::class,'welcome'])->name('welcome');



Route::get('/home',[AdminController::class,'index'])->name('home');


Route::view('/create_room','admin.room.create');
Route::post('/add_room',[AdminController::class,'add_room'])->name('room.create');

Route::get('/view_room',[AdminController::class,'show_room'])->name('room.show');


Route::get('/edit_room/{id}',[AdminController::class,'edit_room'])->name('edit_room');
Route::post('/update_room/{id}',[AdminController::class,'update_room'])->name('update_room');



Route::get('/delete_room/{id}',[AdminController::class,'delete_room'])->name('delete_room');
Route::get('/delete_allroom',[AdminController::class,'delete_allroom'])->name('delete_allroom');


Route::get('/room_details/{id}',[HomeController::class,'room_details'])->name('single_room');

Route::post('/room_booking/{id}',[HomeController::class,'room_booking'])->name('room_booking');



Route::get('/show_booking',[AdminController::class,'show_booking'])->name('show_booking');

Route::get('/delete_booking/{id}',[AdminController::class,'delete_booking'])->name('delete_booking');


Route::get('/booking_approve/{id}',[AdminController::class,'booking_approve'])->name('approve');
Route::get('/booking_reject/{id}',[AdminController::class,'booking_reject'])->name('reject');


Route::get('/show_gallery',[AdminController::class,'show_gallery'])->name('show_gallery');
Route::post('/upload_gallery',[AdminController::class,'upload_gallery'])->name('upload_gallery');

Route::get('/delete_gallery/{id}',[AdminController::class,'delete_gallery'])->name('delete_gallery');

Route::post('/contact',[HomeController::class,'contact'])->name('contact');


Route::get('/show_contact',[AdminController::class,'show_contact'])->name('show_contact');

Route::get('/sent_mail/{id}',[AdminController::class,'sent_mail'])->name('sent_mail');
