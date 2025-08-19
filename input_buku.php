<?php
define('FILE_JSON', 'data_buku.json');

function cekFileJson()
{
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}
function bacaDataJson()
{
    return json_decode(file_get_contents(FILE_JSON), true);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    cekFileJson();
    $kode = $_POST['kodeB'];
    $judul = $_POST['judulB'];
    $kategori = $_POST['kate'];
    $penerbit = $_POST['pener'];
    $harga = $_POST['harga'];


    $data_buku = bacaDataJson();

    for ($i = 0; $i < count($data_buku); $i++) {
        if ($data_buku[$i]['kodeB'] == $kode) {
            echo "<script>alert('Buku dengan kode $kode sudah ada!');</script>";
            echo "<script>window.location.href='form.html';</script>";
            exit();
        }
    }
    $data_buku[] = [
        'kodeB' => $kode,
        'judulB' => $judul,
        'kate' => $kategori,
        'pener' => $penerbit,
        'harga' => $harga,


    ];
    file_put_contents(FILE_JSON, json_encode($data_buku, flags: JSON_PRETTY_PRINT));
    echo "<script>alert('Data berhasil ditambahkan!');</script>";
    echo "<script>window.location.href='proses_buku.php';</script>";
}
?>