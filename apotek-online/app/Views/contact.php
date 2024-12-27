<?= $this->extend('partials/layout'); ?>

<?= $this->section('main'); ?>

<div class="container mt-4">
    <h1 class="mb-4">Kontak Kami</h1>

    <div class="row">
        <?php if (empty($contacts)) : ?>
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada kontak yang tersedia.</p>
            </div>
        <?php else : ?>
            <?php foreach ($contacts as $contact) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($contact['nama']); ?></h5>
                            <p class="card-text">
                                <strong>No Telepon:</strong> <?= esc($contact['no_telepon']); ?><br>
                                <strong>Email:</strong> <?= esc($contact['email']); ?><br>
                                <strong>Alamat:</strong> <?= esc($contact['alamat']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>
