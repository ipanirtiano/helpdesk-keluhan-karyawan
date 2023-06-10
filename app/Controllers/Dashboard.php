<?php

namespace App\Controllers;

use App\Models\GuestModel;
use App\Models\KeluhanModel;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $this->guestModel = new GuestModel();
        $this->keluhanModel = new KeluhanModel();
    }

    public function index()
    {
        // tanggal 
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $bulan = date('m');

        // get session level
        $level = session('level');

        // jika level adalah karyawan
        if ($level == 'karyawan') {
            // get session kode karyawan
            $kode_karyawan = session('kode_guest');
            $keluhan_karyawan = $this->keluhanModel->getNumRows_karyawan($kode_karyawan);
        } else {
            $keluhan_karyawan = $this->keluhanModel->getNumRows();
        }

        // get nums rows
        $pengguna = $this->guestModel->getNumRows();



        $data = [
            'tittle' => 'Dashboard | Home',
            'pengguna' => $pengguna,
            'keluhan' => $keluhan_karyawan
        ];
        return view('Dashboard/index', $data);
    }
}
