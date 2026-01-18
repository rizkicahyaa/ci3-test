<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php $this->load->view('navbar'); ?>

<div class="container mt-5">

<h3>Edit Mahasiswa</h3>

<form method="post">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="<?= $mhs->name ?>" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?= $mhs->email ?>" required>
    </div>

    <div class="mb-3">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="<?= $mhs->jurusan ?>" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
</form>

</div>

</body>
</html>
