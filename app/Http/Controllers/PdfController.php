<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class PdfController extends Controller
{
    //
    public function index(){
    	return view('pdf.index');
    }

    public function cetakPdf(){
    	$pdf = PDF::loadview('pdf.cetakPdf')->setPaper('A4','potrait');
   		 return $pdf->stream();
    }
}
