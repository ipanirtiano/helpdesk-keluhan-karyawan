<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluhanModel extends Model
{
    protected $table = 'keluhan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_keluhan', 'tanggal_create', 'tanggal_update', 'subject', 'detail_keluhan', 'created', 'progres', 'status', 'foto', 'created_at', 'updated_at'];

    public function getNumRows()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'helpdesk_keluhan');
        $query = mysqli_query($conn, "SELECT * FROM keluhan");
        $count = mysqli_num_rows($query);

        return $count;
    }

    public function getNumRows_karyawan($kode_karyawan)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'helpdesk_keluhan');
        $query = mysqli_query($conn, "SELECT * FROM keluhan WHERE created = '$kode_karyawan'");
        $count = mysqli_num_rows($query);

        return $count;
    }
}
