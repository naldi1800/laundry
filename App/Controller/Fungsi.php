<?php


namespace App\Contorller;


class Fungsi
{
    static function rupiah($angka){
        $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
        return $hasil_rupiah;     
    }
}