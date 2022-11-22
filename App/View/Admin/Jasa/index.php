<h2 class="h2 text-center">
    Data Penjualan
</h2>
<a href="?page=jasa&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>



<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Nama Pelanggang</th>
            <th>Jenis Jasa</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Bayar</th>
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
            <tr>
                <td width="10%" class="text-center"><?= $no ?></td>
                <td width="20%" class="text-center"><?= $data['nama_user'] ?></td>
                <td width="15%" class="text-center"><?= $data['nama_jenis'] ?></td>
                <td width="10%" class="text-center"><?= $data['berat'] ?></td>
                <td width="15%" class="text-center"><?= Fungsi::rupiah($data['harga']) ?></td>
                <td width="15%" class="text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Diskon <?= $data['diskon'] ?> %"><?= Fungsi::rupiah($bayar) ?> </td>
                <td width="15%" class="">
                    <center>
                        <a href="?page=jasa&c=selesai&id=<?= $data['id_jasa'] ?>" class="text-center btn btn-success">
                            Selesai
                        </a>
                        <a href="?page=jasa&c=hapus&id=<?= $data['id_jasa'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>