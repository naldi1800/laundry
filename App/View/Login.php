<?php

use App\Model\Login;  //Class login
use App\Contorller\Alert; //Class Alert

if (isset($_POST['login'])) {
    $cek = Login::Login($link, $_POST['user'], $_POST['pass'], $_POST['level']);
    if ($cek != null) {
        $_SESSION['isLogin'] = "Login";
        if ($_POST['level'] == "Admin") {
            $_SESSION['ADMIN'] = $cek['id'];
        }
        Alert::Set("Anda", "Login", "berhasil");
        header("Location: index.php?page=home&c=index");
        exit;
    } else {
        Alert::Set("Anda", "Login | Username/Password Salah", "gagal");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL ?>/TP/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 -->
    <link href="<?= BASEURL ?>/TP/Select2/css/select2.min.css" rel="stylesheet"/>
    <script src="<?= BASEURL ?>/TP/Select2/js/select2.min.js"></script>

    <!-- Dselect -->
    <script src="<?= BASEURL ?>/TP/dselect.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="TP/Login/css/style.css">

    

    <title>Login</title>
</head>
<body>
<div class="container-fluid">
    <div class=" shadow p-3 mb-5 mt-2 bg-light rounded">
        <?= \App\Contorller\Alert::Get(); ?>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h1 class="heading-section">LOGIN</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10">
                        <div class="wrap d-md-flex">
                            <!-- <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                                <div class="text w-100">
                                    <h2>Welcome to login</h2>
                                    <!-- <p id="ketbukan">bukan admin?</p> -->
                                    <!-- <button class="btn btn-white btn-outline-white" id="ch">Admin</button> -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <div class="login-wrap p-4 p-lg-5 col-12">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4" id="ket">Admin</h3>
                                    </div>
                                </div>
                                <form method="post" class="signin-form">
                                    <div class="form-group mb-3">
                                        <label class="label" for="user" id="labeluser">Username</label>
                                        <input name="user" id="user" type="text" class="form-control"
                                               placeholder="Username"
                                               required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="pass">Password</label>
                                        <input name="pass" id="pass" type="password" class="form-control"
                                               placeholder="Password"
                                               required>
                                    </div>
                                    <input type="text" name="level" id="level" value="Admin" hidden>
                                    <div class="form-group">
                                        <button type="submit" name="login"
                                                class="form-control btn submit px-3" style="background-color: grey; color:white">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    // document.getElementById("ch").onclick = function (event) {
    //     var cek = document.getElementById("ch").innerHTML;
    //     document.getElementById("labeluser").innerHTML = (cek == "Dosen") ? 'NIDN' : 'Username';
    //     document.getElementById("user").placeholder = (cek == "Dosen") ? 'NIDN' : 'Username';
    //     document.getElementById("ch").innerHTML = (cek == "Dosen") ? 'Admin' : 'Dosen';
    //     document.getElementById("ket").innerHTML = (cek != "Dosen") ? 'Admin' : 'Dosen';
    //     document.getElementById("level").value = (cek != "Dosen") ? 'Admin' : 'Dosen';
    //     document.getElementById("ketbukan").innerHTML = (cek != "Dosen") ? 'bukan admin?' : 'bukan dosen?';
    // }
</script>
<script src="<?= BASEURL ?>/TP/js/bootstrap.bundle.min.js"></script>
<script src="TP/Login/js/jquery.min.js"></script>
<script src="TP/Login/js/popper.js"></script>
<script src="TP/Login/js/bootstrap.min.js"></script>
<script src="TP/Login/js/main.js"></script>

</body>
</html>