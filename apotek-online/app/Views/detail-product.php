<?= $this->extend('partials/layout'); ?>

<?= $this->section('main'); ?>

<div class="container mt-4">
    <h1 class="mb-4"><?= esc($produk['nama_produk']); ?></h1>

    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url($produk['foto']); ?>" alt="<?= esc($produk['nama_produk']); ?>" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-6">
            <h4>Harga: Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></h4>
            <h5>Kategori: <?= esc($produk['nama_kategori']); ?></h5>
            <a href="<?= base_url(); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
