<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Imunisasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    @page {
        size: A4
    }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }
    </style>
</head>

<body class="A4">
    <center>
        <h2>LAPORAN Data Imunisasi</h2>
    </center>

    <br />

    <table border="1" class="table">
        <tr>
            <th><b>No</b></th>
            <th><b>Nama Balita</b></th>
            <th><b>TTL</b></th>
            <th><b>Jenis Kelamin</b></th>
            <th><b>Posyandu</b></th>
            <th><b>Bidan</b></th>
            <th><b>Jenis Imunisasi</b></th>
        </tr>
        <?php
        $no = 1;
        foreach ($imunisasi as $i) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $i->nama_balita ?></td>
            <td><?= $i->tempat_lahir_balita.', '.date('d-m-Y',strtotime($i->tanggal_lahir_balita)) ?>
            </td>
            <td><?php 
                if ($i->jk_balita == 'L'){
                    echo 'Laki-Laki';
                }elseif ($i->jk_balita == 'P'){
                    echo 'Perempuan';
                } ?></td>
            <td><?= $i->nama_posyandu ?></td>
            <td><?= $i->nama ?></td>
            <td><?= $i->nama_vaksin ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <script>
    window.print();
    </script>
</body>

</html>