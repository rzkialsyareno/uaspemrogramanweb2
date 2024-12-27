<?= $this->extend('partials/layout'); ?>

<?= $this->section('main'); ?>
<!-- Page Header -->
<div class="bg-light py-4 mb-4 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0">Beranda</h1>
                <p class="mb-0">Halaman Pemasanan</p>
            </div>
        </div>
    </div>
</div>

<!-- Product Grid -->
<div class="container">
    <div class="row">
        <?php foreach ($product as $produk) : ?>
            <div class="col-md-4 mb-4">
                <div class="card border shadow-sm overflow-hidden h-100">
                    <img src="<?= base_url($produk['foto']) ?>" alt="Product Image" class="card-img-top object-fit-cover" style="height: 200px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0"><?= esc($produk['nama_produk']); ?></h5>
                            <span class="fw-medium">Rp. <?= number_format($produk['harga'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?= base_url('detail_product/' . $produk['id']) ?>" class="btn btn-light rounded-pill px-3 py-2 border">
                                <i class="mdi mdi-eye"></i>
                            </a>
                            <a href="https://wa.me/081238191029?text=Halo%2C%20saya%20mau%20pesan%20<?= urlencode($produk['nama_produk']) ?>" class="btn btn-light rounded-pill flex-grow-1 d-flex align-items-center justify-content-center gap-2 border">
                                <i class="mdi mdi-cart"></i>
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>