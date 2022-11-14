<?php
    if($_GET['id'])
        \App\Model\JenisJasa::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=jenisjasa&c=index");
    exit;