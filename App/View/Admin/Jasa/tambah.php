<?php

use  App\Model\Jasa;
use App\Model\JenisJasa;

if (isset($_POST["tambah"])) {
    Jasa::Insert($link, $_POST);
    header("Location: index.php?page=jasa&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Input New Pesanan
    </h2>

    <form class="row g-3 needs-validation p-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="id_jenis" class="form-label">Jenis</label>
            <select id="id_jenis" name="id_jenis" class="form-select" onchange="getJenis(this)" require>
                <option>Pilih</option>
                <?php
                $jeniss = JenisJasa::GetAll($link);
                foreach ($jeniss as $jenis) :
                ?>
                    <option value="<?= $jenis['id_jenis'] ?>" data-diskon="<?= $jenis['diskon'] ?>" data-harga="<?= $jenis['harga'] ?>" data-lama="<?= $jenis['lama'] ?>">
                        <?= $jenis['nama_jenis'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter a jenis
            </div>
        </div>
        <div class="col-md-4">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" value="0" name="harga" required readonly>
        </div>
        <div class="col-md-4">
            <label for="diskon" class="form-label">Diskon</label>
            <input type="text" value="0" class="form-control" id="diskon" name="diskon" required readonly>
        </div>
        <div class="col-md-2">
            <label for="berat" class="form-label">Lama Pengerjaan</label>
            <input type="text" class="form-control" id="lamashow" name="lamashow" value="0" required disabled>
            <input type="hidden" class="form-control" id="lama" name="lama" value="0" required readonly>
        </div>
        <div class="col-md-2">
            <label for="berat" class="form-label">Berat</label>
            <input type="number" class="form-control" onchange="cJml();" id="berat" name="berat" min="1" value="0" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter in the student's name and at least 3 letters
            </div>
        </div>
        <div class="col-md-4">
            <label for="total" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total" name="total" required readonly>
        </div>
        <div class="col-md-4">
            <label for="total_bayar" class="form-label">Total Bayar</label>
            <input type="text" class="form-control" id="total_bayar" name="total_bayar" required readonly>
        </div>
        <div class="col-md-6">
            <label for="nama_user" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_user" name="nama_user" required>
        </div>
        <div class="col-md-6">
            <label for="ket" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="ket" name="ket" required>
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-primary col-md-12" type="submit" name="tambah">Save</button>
        </div>
    </form>
</div>

<script>
    function getJenis(e) {
        document.getElementById("harga").value = e.options[e.selectedIndex].dataset.harga;
        dis = e.options[e.selectedIndex].dataset.diskon;
        document.getElementById("diskon").value = dis + "%";

        document.getElementById("berat").value = 1;
        document.getElementById("berat").max = e.options[e.selectedIndex].dataset.stok;
        jam = e.options[e.selectedIndex].dataset.lama;
        document.getElementById("lama").value = jam;
        showlama = document.getElementById("lamashow");
        if(jam >= 24){
            hari = (jam/24) | 0;
            jamsisa = jam % 24;
            if(jamsisa > 0){
                showlama.value = hari + " hari " + jamsisa + " jam";
            }
            else{
                showlama.value = hari + " hari";
            }
        }else{
            showlama.value = jam + " jam";
        }

        getTotal();

    }

    function cJml() {
        getTotal();
    }

    function getTotal() {
        document.getElementById("total").value = document.getElementById("berat").value * document.getElementById("harga").value;
        var diskon = document.getElementById("total").value * (dis / 100);
        document.getElementById("total_bayar").value = document.getElementById("total").value - diskon;

    }

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