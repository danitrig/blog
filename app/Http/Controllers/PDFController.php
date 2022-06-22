<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function pdfView(){
        $users = User::all();
        return view('PDF.pdf_view', compact('users'));

    }


    public function pdfGeneration(){

        $users = User::all();

        $pdf = PDF::loadView('PDF.pdf_convert', compact('users'));

        return $pdf->download('list_pdf.pdf');
    }
}
