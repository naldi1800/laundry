<?php
require_once "App/init.php";
use App\Contorller\Fungsi;
date_default_timezone_set("Asia/Ujung_pandang"); 

$q = $_REQUEST["q"];
$result = Fungsi::getReturnTimeEnded($q)[0];
echo $result;
