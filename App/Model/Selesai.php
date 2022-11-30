<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;

class Selesai extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_selesai . " as A JOIN " . parent::$t_jasa . " as B ON A.id_jasa=B.id_jasa JOIN " . parent::$t_jenisjasa . " as C ON B.id_jenis=C.id_jenis";
        $query = mysqli_query($link, $sql);
        // var_dump(mysqli_error($link));
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        // var_dump($data);
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_selesai . " WHERE id_selesai='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data){}

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_selesai . " WHERE id_selesai='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Selesai", "dihapus", "berhasil");
        } else {
            Alert::Set("Data Selesai", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_selesai . " VALUES( null, '"
            . $data['id_jasa'] . "','"
            . $data['id_admin'] . "', CURRENT_TIMESTAMP)";
        
        // var_dump($sql);
        $query = mysqli_query($link, $sql);
        
        if ($query) {
            Alert::Set("Data Selesai", "disimpan", "berhasil");
        } else {
            Alert::Set("Data Selesai", "disimpan", "gagal");
        //    echo "Error : " . mysqli_error($link);
        }
    }
}