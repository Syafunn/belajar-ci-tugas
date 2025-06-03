<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<?php
if (session()->getFlashData('failed')) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>
<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Category name</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($product_category as $index => $produkkategori) : ?>
            <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= esc($produkkategori['category_name']) ?></td>
                <td><?= esc($produkkategori['description']) ?></td>
                <td><?= esc($produkkategori['created_at']) ?></td>
                <td><?= esc($produkkategori['updated_at']) ?></td>
                <td>
                    <!-- Tombol Edit Modal -->
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produkkategori['id'] ?>">Ubah</button>
                    <!-- Tombol Hapus -->
                    <a href="<?= base_url('produkKategori/delete/' . $produkkategori['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal-<?= $produkkategori['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="<?= base_url('produkKategori/edit/' . $produkkategori['id']) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" name="category_name" class="form-control" value="<?= esc($produkkategori['category_name']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="description" class="form-control" value="<?= esc($produkkategori['description']) ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </tbody>
</table>

<!-- End Table with stripped rows --> 
<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('produkKategori') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="category_name" class="form-control" id="nama" placeholder="Nama Kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="name">deskripsi</label>
                        <input type="text" name="description" class="form-control" id="deskripsi" placeholder="deskripsi" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="name">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Modal End -->
<?= $this->endSection() ?>
