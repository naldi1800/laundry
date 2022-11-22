<h2 class="h2 text-center">
    Pelayanan Selesai
</h2>
<!-- <a href="?page=mid&c=tambah" class="btn btn-outline-success mb-3">Tambah</a> -->
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Jasa</th>
            <th>Berat</th>
            <th>Total Bayar</th>
            <th>Tanggal Ambil</th>
        </tr>
    </thead>
    <tbody>
        <?php

        use App\Model\Selesai;
        use App\Contorller\Fungsi;

        $i = 0;
        $datas = Selesai::GetAll($link);
        foreach ($datas as $data) :
            $i++;
        ?>
            <tr>
                <td width="5%" class="text-center"><?= $i ?></td>
                <td width="20%" class="text-center"><?= $data['nama_user'] ?></td>
                <td width="15%" class="text-center"><?= $data['nama_jenis'] ?></td>
                <td width="10%" class="text-center"><?= $data['berat'] ?></td>
                <td width="15%" class="text-center"><?= Fungsi::rupiah(($data['harga']*$data['berat']) - ($data['harga']*$data['berat']*$data['diskon'])) ?></td>
                <td width="25%" class="text-center"><?= $data['returntime_selesai'] ?></td>
                <!-- <td width="15%" class="">
                    <center>
                        <a href="?page=mid&c=ubah&id=<?= $data['id_selesai'] ?>" class="text-center btn btn-info">
                            Edit
                        </a>
                        <a href="?page=mid&c=hapus&id=<?= $data['id_selesai'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td> -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>