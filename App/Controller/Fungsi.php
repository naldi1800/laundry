<?php


namespace App\Contorller;

use DateTime;


class Fungsi
{
    public static function rupiah($angka)
    {
        $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    public static function getDayWithHours($jam)
    {
        if ($jam > 24) {
            $hari = ($jam / 24) | 0;
            $sisajam = $jam % 24;
            if ($sisajam > 0) return $hari . " hari " . $sisajam . " jam";
            else return $hari . " hari";
        } else {
            return $jam . " jam";
        }
    }

    public static function getReturnTimeEnded($returndate)
    {
        $formatDate = "Y-m-d H:i:s";
        $returndate = new DateTime($returndate);
        $datenow = new DateTime(date($formatDate));
        
        $interval = $returndate->diff($datenow);
        $lewat = strtotime($returndate->format($formatDate)) <= strtotime($datenow->format($formatDate));
        $result = "";
        if ($interval->d) {
            $result .= $interval->format("%d hari ");
        }
        if ($interval->h) {
            $result .= $interval->format("%h jam ");
        }
        if ($interval->i) {
            $result .= $interval->format("%i menit ");
        }
        if ($interval->s) {
            $result .= $interval->format("%s detik ");
        }
        if($lewat) $result = "Sudah Bisa Diambil";
        return [$result, $lewat];
    }
}
