<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;

class DocumentController extends Controller
{
    /* Laravel Convert Word To PDF Tutorial
     * By ScratchCode.io
     */
    public function convertWordToPDF()
    {
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        /*@ Reading doc file */
        $template = new TemplateProcessor(public_path('facture.docx'));

        /*@ Replacing variables in doc file */

        $template->setValue('company.name', 'Réalise');
        $template->setValue('company.street', 'Rue Viguet 8');
        $template->setValue('company.zip', '1227');
        $template->setValue('company.city', 'Les Acacias');
        $template->setValue('adress.name', 'Rodjak');
        $template->setValue('address.street', 'Rue Viguet 8');
        $template->setValue('address.zip', '1205');
        $template->setValue('address.city', 'Geneve ');
        $template->setValue('country', 'Suisse');
        $template->setValue('i.reference', '11111');
        $template->setValue('i.date', date('d-m-Y'));


        /*@ Save Temporary Word File With New Name */
        /*
        try{
            $template->saveAs(storage_path('new-facture.docx'));
        }catch (Exception $e){
            dd('error');
        }
        */
        $saveDocPath = public_path('new-facture.docx');
        $template->saveAs($saveDocPath);

        // Load temporarily create word file
        /*
        $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath);

        //Save it into PDF
        $savePdfPath = public_path('new-facture.pdf');
        */

        /*@ If already PDF exists then delete it */
        /*
        if ( file_exists($savePdfPath) ) {
            unlink($savePdfPath);
        }
        */

        //Save it into PDF
        /*
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save($savePdfPath);
        */
        echo 'File has been successfully converted';

        /*@ Remove temporarily created word file */
        /*
        if ( file_exists($saveDocPath) ) {
            unlink($saveDocPath);
        }
        */
    }
}
