<?php namespace App\Model;

abstract class Data
{
    protected static $t_jenisjasa = "jenis_jasa";
    protected static $t_jasa = "jasa";
    protected static $t_selesai = "selesai";
    protected static $t_mid = "mid";
    


    public static abstract function GetAll($link);

    public static abstract function GetWithId($link, $id);

    public static abstract function Update($link, $id, $data);

    public static abstract function Delete($link, $id);

    public static abstract function Insert($link, $data);
}