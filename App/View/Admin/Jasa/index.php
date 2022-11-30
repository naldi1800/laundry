<h2 class="h2 text-center">
    Data Penjualan
</h2>
<a href="?page=jasa&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr class="align-middle">
            <th>No</th>
            <th>Nama Pelanggang</th>
            <th>Jenis Jasa</th>
            <th>Berat</th>
            <th>Harga Per Kg</th>
            <th>Bayar</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Ambil</th>
            <th>Sisa Waktu</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        use App\Model\Jasa;
        use App\Contorller\Fungsi;

        $datas = Jasa::GetAll($link);
        $no = 1;
        foreach ($datas as $data) :
            $bayar = $data['harga'] * $data['berat'];
            $dis = $bayar * ($data['diskon'] / 100);
            $bayar = $bayar - $dis;
        ?>
            <tr class="align-middle">
                <td width="5%" class="text-center"><?= $no ?></td>
                <td width="18%" class="text-center"><?= $data['nama_user'] ?></td>
                <td width="10%" class="text-center"><?= $data['nama_jenis'] ?></td>
                <td width="5%" class="text-center"><?= $data['berat'] ?></td>
                <td width="7%" class="text-center"><?= Fungsi::rupiah($data['harga']) ?></td>
                <td width="7%" class="text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Diskon <?= $data['diskon'] ?> %"><?= Fungsi::rupiah($bayar) ?> </td>
                <td width="10%" class="text-center"><?= $data['createtime'] ?></td>
                <td width="10%" class="text-center"><?= $data['returntime'] ?></td>
                <td width="13%" class="text-center" id="returnTimeEnd<?= $data['id_jasa'] ?>">
                    <?= Fungsi::getReturnTimeEnded($data['returntime'])[0] ?>
                </td>
                <!-- <td width="8%" class="text-center" id="returnTimeEnd"></td> -->
                <td width="15%" class="">
                    <center>
                        <a href="?page=jasa&c=selesai&id=<?= $data['id_jasa'] ?>" class="text-center btn btn-success" <?= (Fungsi::getReturnTimeEnded($data['returntime'])[1] ? "" : "hidden")  ?>>
                            Selesai
                        </a>
                        <a href="?page=jasa&c=hapus&id=<?= $data['id_jasa'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td>
            </tr>
            <script>
                setInterval(function() {
                    var str = "<?= $data['returntime'] ?>";
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("returnTimeEnd<?= $data['id_jasa'] ?>").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "time.php?q=" + str, true);
                    xmlhttp.send();
                }, 1000);
            </script>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>