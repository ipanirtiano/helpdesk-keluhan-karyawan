<?php

namespace App\Models;

use CodeIgniter\Model;

class SaranModel extends Model
{
    protected $table = 'saran';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_saran', 'tanggal_create', 'tanggal_update', 'subject', 'detail_saran', 'created', 'progres', 'status', 'foto', 'created_at', 'updated_at'];

    public function getNumRows()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'helpdesk_keluhan');
        $query = mysqli_query($conn, "SELECT * FROM saran");
        $count = mysqli_num_rows($query);

        return $count;
    }
}
