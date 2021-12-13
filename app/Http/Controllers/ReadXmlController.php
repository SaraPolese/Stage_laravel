<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use PhpOffice\PhpWord\Writer\PDF as WriterPDF;
use PhpOffice\PhpWord\Writer\PDF\DomPDF;

class ReadXmlController extends Controller
{
    public function index()
    {

        $xmlDataString = file_get_contents(public_path('sample-course.xml'));
        $xmlObject = simplexml_load_string($xmlDataString);

        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);

        echo "<pre>";
        print_r($phpDataArray);


        // share data to view
        view()->share('client',$phpDataArray);
        $pdf = PDF::loadView('pdf_view', $phpDataArray);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }




}
