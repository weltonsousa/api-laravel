<?php

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

Route::get('pokemon', function () {
    return view('pokemon');
});

// Route::resource('home', 'HomeController');

Route::get('home', function () {

    $clientes = DB::table('clientes')
                // ->offset(10) 
                ->limit(50)
                ->get();

    $data = ['clientes' => $clientes];
    $pdf = PDF::loadView('pdf.holerite.index', $data);
    return $pdf->stream('index.pdf');

    // $data = ['clientes' => $clientes];
    // $pdf = PDF::loadView('pdf.home', $data);
    // return $pdf->stream('home.pdf');
});