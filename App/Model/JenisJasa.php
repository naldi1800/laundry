<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;

class JenisJasa extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_jenisjasa;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_jenisjasa . " WHERE id_jenis='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_jenisjasa . " SET " .
            "nama_jenis='" . $data['nama_jenis'] .  "', ".
            "harga='" . $data['harga'] .  "', ".
            "diskon='" . $data['diskon'] .  "', ".
            "lama='" . $data['lama'] .  "' ".
            " WHERE id_jenis='" . $id . "'";

        $query = mysqli_query($link, $sql);
        var_dump($sql);
        if ($query) {
            Alert::Set("Data Jenis Jasa", "diubah", "berhasil");
        } else {
            Alert::Set("Data Jenis Jasa", "diubah", "gagal");
           echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_jenisjasa . " WHERE id_jenis='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Jenis Jasa", "dihapus", "berhasil");
        } else {
            Alert::Set("Data Jenis Jasa", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_jenisjasa . " VALUES( null, '"
            . $data['nama_jenis'] . "','"
            . $data['harga'] . "','"
            . $data['diskon'] . "','"
            . $data['lama'] . "')";
        
        // var_dump($sql);
        $query = mysqli_query($link, $sql);
        
        if ($query) {
            Alert::Set("Data Jenis Jasa", "disimpan", "berhasil");
        } else {
            Alert::Set("Data Jenis Jasa", "disimpan", "gagal");
        //    echo "Error : " . mysqli_error($link);
        }
    }
}