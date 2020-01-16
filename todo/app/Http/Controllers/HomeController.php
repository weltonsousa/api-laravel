<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Clientes;
use DB;

class HomeController extends Controller
{
    public function index(){

    $clientes = DB::table('clientes')
                // ->offset(10)
                ->limit(1)
                ->get();

    $data = ['clientes' => $clientes];
//  dd($data);
    $pdf = PDF::loadView('pdf.home', $data);
    return $pdf->stream('home.pdf');

    //  $data = ['folha' => $folha];
    //  $pdf = PDF::loadView('pdf.folha.index', $data);
    //     return $pdf->stream('index.pdf');
}
}
