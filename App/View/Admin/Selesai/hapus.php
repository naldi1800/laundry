<?php
    if($_GET['id'])
        \App\Model\Mid::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=mid&c=index");
    exit;