<?php
    if($_GET['id']){
        $data = array(
            "id_jasa"=>$_GET['id'],
            "id_admin"=>$_SESSION['ADMIN'],

        );
        \App\Model\Selesai::Insert($link, $data);
    }

    header("location: " . BASEURL . "/index.php?page=jasa&c=index");
    exit;