<?php

function format_rupiah($angka){
    $hasil_rupiah = "Rp " . format_uang($angka);
    return $hasil_rupiah;
}

function format_uang($angka){
    $nilai = number_format($angka, 0, ',', '.');
    return $nilai;
}

?>