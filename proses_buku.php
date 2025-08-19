<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>UJK</title>
    <style>

        table {
            width: 60%;
            padding: 50px;
            margin: auto;
        }
        h2 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .navbar {
            padding-top: 0;
            padding-bottom: 0;

        }
    
        .nav-link {
            color: #ffffff;
        }
        .navbar-brand {
            color: #ffffff;
        }

        th,
        td {
            border: 1px solid #000000ff;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color:  #99c1eeff;
        }

        tr:nth-child(even) {
            background-color: #c5eaff;
        }

        tr:nth-child(odd) {
            background-color: rgba(255, 255, 255, 1)
        }


    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="form.html">FORM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="proses_buku.php">DATA BUKU</a>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>

<?php
session_start(); // Mulai session
?>

<?php
define('FILE_JSON', 'data_buku.json');

function cekFileJson()
{
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);
    return json_decode($json, true);
}

$data_buku = cekFileJson();
$total_data = count($data_buku);

if ($total_data == 0) {
    echo "<p>Belum ada data barang yang disimpan.</p>";
} else {
    echo "<table>
            <h2>SISTEM PENDATAAN BUKU</h2>
            <thead>
              <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>";

    for ($i = 0; $i < $total_data; $i++) {
        $buku = $data_buku[$i];
        echo "<tr>";
        echo "<td>" . htmlspecialchars($buku['kodeB']) . "</td>";
        echo "<td>" . htmlspecialchars($buku['judulB']) . "</td>";
        echo "<td>" . htmlspecialchars($buku['kate']) . "</td>";
        echo "<td>" . htmlspecialchars($buku['pener']) . "</td>";
        echo "<td>Rp" . number_format($buku['harga']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
}
?>
</body>