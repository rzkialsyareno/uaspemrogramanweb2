<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="menuOffcanvas">
        <div class="offcanvas-header bg-success text-white">
            <div class="d-flex align-items-center gap-3">
                <i class="mdi mdi-medical-bag fs-3"></i>
                <div>
                    <h5 class="offcanvas-title mb-0">Apotek Online</h5>
                    <small>Melayani Sepenuh Hati</small>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="list-group list-group-flush">
                <a href="<?= base_url() ?>" class="list-group-item list-group-item-action py-3 px-4">
                    <div class="d-flex align-items-center gap-3">
                        <i class="mdi mdi-home fs-5"></i>
                        <span>Beranda</span>
                    </div>
                </a>
                <a href="<?= base_url() ?>contact" class="list-group-item list-group-item-action py-3 px-4">
                    <div class="d-flex align-items-center gap-3">
                        <i class="mdi mdi-phone fs-5"></i>
                        <span>Kontak</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar bg-success">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <button class="btn btn-link text-white p-0 border-0" data-bs-toggle="offcanvas" data-bs-target="#menuOffcanvas">
                    <i class="mdi mdi-menu fs-4"></i>
                </button>
                <a class="navbar-brand text-white m-0" href="<?= base_url() ?>">APOTEK ONLINE</a>
                <a href="#" class="text-white text-decoration-none">
                    <i class="mdi mdi-cart-outline fs-4"></i>
                </a>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('main'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>