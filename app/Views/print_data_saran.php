<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .container {
            position: relative;
            width: 100%;
            height: 100%;
            padding: 10px;
        }

        .table-data {
            position: absolute;
            top: 180px;
            width: 100%;
            border-collapse: collapse;
        }

        .table-data th,
        td {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th width="780px">
                <div style="font-size: 18px;"><b>DATA SARAN</b>
                    <div style="font-size: 10px;"></div>
                    <hr>
                </div>

            </th>
        </tr>
    </table>



    <table class="table-data" cellpadding="2">
        <tr style="background-color:#c9c7c1; font-weight:bold;">
            <th width="25px">No</th>
            <th width="100">Id Keluhan</th>
            <th width="100">Subject</th>
            <th width="80">Tanggal Create</th>
            <th width="80">Tanggal Update</th>
            <th width="190">Created</th>
            <th width="60">Progres</th>
            <th width="100">Status</th>
        </tr>
        <?php
        $i = 1;


        foreach ($data_saran as $data) :

            $conn = mysqli_connect('localhost', 'root', '', 'helpdesk_keluhan');
            // get nama karyawan
            $data_karyawan = $data['created'];
            // query manual
            $query = mysqli_query($conn, "SELECT * FROM guest WHERE kode_guest = '$data_karyawan' ");
            // get data booking as array
            $data_karyawan = mysqli_fetch_array($query);

        ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data['kode_saran']; ?></td>
                <td><?= $data['subject'] ?></td>
                <td><?= $data['tanggal_create'] ?></td>
                <td><?= $data['tanggal_update']; ?></td>
                <td><?= $data_karyawan['nama_lengkap']; ?></td>
                <td><?= $data['progres']; ?> %</td>
                <td><?= $data['status']; ?></td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </table>
    <div class="div"></div>

    <br>
    <br>
</body>

</html>