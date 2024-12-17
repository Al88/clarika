<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'CodeIgniter App') ?></title>
    <meta name="description" content="Aplicación de gestión de invitados">
    <meta name="keywords" content="invitados, gestión, CodeIgniter">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png') ?>">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- Meta tags para redes sociales -->
    <meta property="og:title" content="<?= esc($title ?? 'CodeIgniter App') ?>">
    <meta property="og:description" content="Aplicación de gestión de invitados">
    <meta property="og:image" content="<?= base_url('assets/img/og-image.png') ?>">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="<?= esc($title ?? 'CodeIgniter App') ?>">
    <meta property="twitter:description" content="Aplicación de gestión de invitados">
    <meta property="twitter:image" content="<?= base_url('assets/img/og-image.png') ?>">
</head>

<body>
    <header>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('guests') ?>">GuestApp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('guests') ?>">Invitados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('guests/create') ?>">Crear Invitado</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <!-- Contenido principal -->
                <div class="col-md-9 ms-sm-auto col-lg-10 px-4">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Aplicación de gestión de invitados &copy; <?= date('Y') ?></span>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>