<?php

use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('index');
})->name('index');

// Main pages routes
Route::get('/mining', function () { return view('mining'); })->name('mining');
Route::get('/contract', function () { return view('contract'); })->name('contract');
Route::get('/ai-arbitrage', function () { return view('ai-arbitrage'); })->name('ai-arbitrage');
Route::get('/ai-buy', function () { return view('ai-buy'); })->name('ai-buy');
Route::get('/ai-record', function () { return view('ai-record'); })->name('ai-record');
Route::get('/loan', function () { return view('loan'); })->name('loan');
Route::get('/loan-record', function () { return view('loan-record'); })->name('loan-record');

// Asset related routes
Route::get('/assets', function () { return view('assets'); })->name('assets');
Route::get('/assets/coin', function () { return view('coin'); })->name('assets-coin');
Route::get('/assets/topup', function () { return view('topup'); })->name('assets-topup');
Route::get('/assets/exchange', function () { return view('exchange'); })->name('assets-exchange');
Route::get('/assets/out', function () { return view('out'); })->name('assets-out');
Route::get('/coin', function () { return view('coin'); })->name('coin');
Route::get('/topup', function () { return view('topup'); })->name('topup');
Route::get('/topup-record', function () { return view('topup-record'); })->name('topup-record');
Route::get('/out', function () { return view('out'); })->name('out');
Route::get('/send-record', function () { return view('send-record'); })->name('send-record');
Route::get('/exchange', function () { return view('exchange'); })->name('exchange');
Route::get('/exchange-record', function () { return view('exchange-record'); })->name('exchange-record');
Route::get('/contract-record', function () { return view('contract-record'); })->name('contract-record');


// User account routes
Route::get('/record', function () { return view('record'); })->name('record');
Route::get('/kyc', function () { return view('kyc'); })->name('kyc');
Route::get('/kyc1', function () { return view('kyc1'); })->name('kyc1');
Route::get('/kyc2', function () { return view('kyc2'); })->name('kyc2');

// Info pages routes
Route::get('/notify', function () { return view('notify'); })->name('notify');
Route::get('/service', function () { return view('service'); })->name('service');
Route::get('/telegram', function () { return view('telegram'); })->name('telegram');
Route::get('/license', function () { return view('license'); })->name('license');
Route::get('/faqs', function () { return view('faqs'); })->name('faqs');
Route::get('/lang', function () { return view('lang'); })->name('lang');
