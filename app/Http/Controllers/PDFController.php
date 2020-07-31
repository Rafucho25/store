<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatePDF($parameter)
    {
        $type = $parameter->type;
        $document = $parameter->document;
        $id = $parameter->documento_id;
        $pdf = PDF::loadView($document);

        switch ($type) {
            case '1':
                return $this->download($pdf);
                break;
            case '2':
                return $this->show($pdf);
                break;
            default:
                return $this->show($pdf);
                break;
        }
    }

    private function download($pdf){

        return $pdf->download('itsolutionstuff.pdf');
    }

    private function show($pdf){

        return $pdf->stream('itsolutionstuff.pdf');
    }
}
