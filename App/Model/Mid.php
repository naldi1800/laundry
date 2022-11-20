<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;

class Mid extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_mid;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_mid . " WHERE id_mid='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_mid . " SET " .
            "nama_jenis='" . $data['nama_jenis'] .  "', ".
            "harga='" . $data['harga'] .  "', ".
            "diskon='" . $data['diskon'] .  "' ".
            " WHERE id_mid='" . $id . "'";

        $query = mysqli_query($link, $sql);
        var_dump($sql);
        if ($query) {
            Alert::Set("Data Mid", "diubah", "berhasil");
        } else {
            Alert::Set("Data Mid", "diubah", "gagal");
           echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_mid . " WHERE id_mid='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Mid", "dihapus", "berhasil");
        } else {
            Alert::Set("Data Mid", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_mid . " VALUES( null, '"
            . $data['nama_jenis'] . "','"
            . $data['harga'] . "','"
            . $data['diskon'] . "')";
        
        // var_dump($sql);
        $query = mysqli_query($link, $sql);
        
        if ($query) {
            Alert::Set("Data Mid", "disimpan", "berhasil");
        } else {
            Alert::Set("Data Mid", "disimpan", "gagal");
        //    echo "Error : " . mysqli_error($link);
        }
    }
}