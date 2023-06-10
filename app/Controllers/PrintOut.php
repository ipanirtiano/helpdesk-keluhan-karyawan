<?php

namespace App\Controllers;

use TCPDF;

use CodeIgniter\Config\Config;
use App\Models\BookingModel;
use App\Models\KeluhanModel;
use App\Models\SaranModel;
use CodeIgniter\HTTP\Request;

class PrintOut extends BaseController
{
    public function __construct()
    {
        $this->keluhanModel = new KeluhanModel();
        $this->saranModel = new SaranModel();
    }


    // Function print out
    public function print()
    {
        $data_keluhan = $this->keluhanModel->findAll();

        $data = [
            'data_keluhan' => $data_keluhan,
        ];

        $html = view('print_data_keluhan', $data);


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPageOrientation('L');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Data Keluhan.pdf', 'I');
    }


    // Function print out
    public function print_saran()
    {
        $data_saran = $this->saranModel->findAll();

        $data = [
            'data_saran' => $data_saran,
        ];

        $html = view('print_data_saran', $data);


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPageOrientation('L');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Data Saran.pdf', 'I');
    }
}
