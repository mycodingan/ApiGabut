<?php

use App\Mail\LoanCreatedMail;
use App\Models\Loan;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});
  Route::get('/test-gmail-email', function () {
    $loan = Loan::latest()->first(); // ambil satu loan contoh
    Mail::to('joshuapplg@gmail.com')->send(new LoanCreatedMail($loan));
    return 'Email dikirim ke Gmail!';
});