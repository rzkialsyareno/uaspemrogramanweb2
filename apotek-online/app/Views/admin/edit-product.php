<?= $this->extend('partials/layout_admin'); ?>

<?= $this->section('main'); ?>

<div class="container mt-4">
    <h1 class="mb-4">Edit Produk</h1>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/product/' . $produk['id'] . '/update') ?>" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= esc($produk['nama_produk']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($category as $kategori) : ?>
                    <option value="<?= esc($kategori['id']); ?>" <?= $produk['id_kategori'] == $kategori['id'] ? 'selected' : ''; ?>>
                        <?= esc($kategori['nama_kategori']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?= esc($produk['harga']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Produk</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <img src="<?= base_url($produk['foto']) ?>" alt="Foto Produk" class="img-thumbnail" style="width: 150px; height: auto;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('admin/product'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>