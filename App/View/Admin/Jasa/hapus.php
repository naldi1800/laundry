<?php
    if($_GET['id'])
        \App\Model\Jasa::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=jasa&c=index");
    exit;