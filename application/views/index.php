<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php $this->load->view('navbar'); ?>

<div class="container mt-5">
    <h3>Data Mahasiswa</h3>
    <a href="<?= base_url('mahasiswa/add') ?>" class="btn btn-primary mb-3">+ Tambah</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; foreach($mahasiswa as $m): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $m->name ?></td>
            <td><?= $m->email ?></td>
            <td><?= $m->jurusan ?></td>
            <td>
                <a href="<?= base_url('mahasiswa/edit/'.$m->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('mahasiswa/hapus/'.$m->id) ?>" 
                class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>

</body>
</html>
