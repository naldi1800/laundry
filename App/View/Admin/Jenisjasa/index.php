<h2 class="h2 text-center">
    MID TEST (192110)
</h2>
<a href="?page=jenisjasa&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Nama Jasa</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        use App\Model\JenisJasa;
        use App\Contorller\Fungsi;

        $i = 0;
        $datas = JenisJasa::GetAll($link);
        foreach ($datas as $data) :
            $i++;
        ?>
            <tr>
                <td width="5%" class="text-center"><?= $i ?></td>
                <td width="35%" class="text-center"><?= $data['nama_jenis'] ?></td>
                <td width="25%" class="text-center"><?= Fungsi::rupiah($data['harga']) ?></td>
                <td width="15%" class="text-center"><?= $data['diskon'] ?></td>
                <td width="15%" class="">
                    <center>
                        <a href="?page=jenisjasa&c=ubah&id=<?= $data['id_jenis'] ?>" class="text-center btn btn-info">
                            Edit
                        </a>
                        <a href="?page=jenisjasa&c=hapus&id=<?= $data['id_jenis'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>