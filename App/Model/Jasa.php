<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;

class Jasa extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_jasa . " as A JOIN " . parent::$t_jenisjasa . " as B ON A.id_jenis=B.id_jenis";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_jasa . " WHERE id_jasa='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data){}

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_jasa . " WHERE id_jasa='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Jasa", "dihapus", "berhasil");
        } else {
            Alert::Set("Data Jasa", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_jasa . " VALUES( null, '"
            . $data['id_jenis'] . "','"
            . $_SESSION['ADMIN'] . "','"
            . $data['nama_user'] . "','"
            . $data['harga'] . "','"
            . $data['diskon'] . "','"
            . $data['berat'] . "','"
            . $data['ket'] . "', '2022-11-15 01:00:00','2022-11-16 01:00:00')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Jasa", "disimpan", "berhasil");
        } else {
            Alert::Set("Data Jasa", "disimpan", "gagal");
            // echo "Error : " . mysqli_error($link);
        }
    }
}
