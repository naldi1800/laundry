<?php

use App\Model\JenisJasa;


if (isset($_POST["ubah"])) {
    JenisJasa::Update($link,  $_POST['id_jenis'],  $_POST);
    header("Location: index.php?page=jenisjasa&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $stb = $_GET['id'];
    $data = JenisJasa::GetWithId($link, $stb);
?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Ubah Jasa
        </h2>
        <form class="row g-3 needs-validation p-3" method="post" enctype="multipart/form-data" novalidate>
            <input type="text" class="form-control" id="id_jenis" name="id_jenis" value="<?= $data['id_jenis'] ?>" hidden>
            <div class="col-md-12">
                <label for="nama_jenis" class="form-label">Nama Jenis Jasa</label>
                <input type="text" class="form-control" value="<?= $data['nama_jenis'] ?>" id="nama_jenis" name="nama_jenis" minlength="3" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter at least 3 letters
                </div>
            </div>
            <div class="col-md-6">
                <label for="harga" class="form-label">Harga Jesis Jasa</label>
                <input type="text" class="form-control" value="<?= $data['harga'] ?>" id="harga" name="harga" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the Harga
                </div>
            </div>
            <div class="col-md-6">
                <label for="diskon" class="form-label">Diskon</label>
                <input type="number" class="form-control" value="<?= $data['diskon'] ?>" id="diskon" min="0" max="100" name="diskon" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the Diskon
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="ubah">Save</button>
            </div>
        </form>
    </div>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
<?php
} else {
    header("Location: " . BASEURL . "/index.php?page=barang&c=index");
    exit;
}
?>