<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Zen PHP Framework' ?></title>
    <!-- Google Fonts: Plus Jakarta Sans & Fira Code -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Style CSS -->
    <link href="<?= baseUrl('public/css/style.css') ?>" rel="stylesheet">
    <script>window.ZEN_BASE_URL = "<?= baseUrl('') ?>";</script>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    
    <!-- Memanggil komponen header -->
    <?php App\Core\App::Component('header', ['title' => $title ?? 'Zen PHP']); ?>

    <main class="flex-grow-1">
        <?php 
            if (isset($_SESSION['success'])) {
                echo '<div class="container mt-4"><div class="alert alert-success alert-custom alert-dismissible fade show border-0 bg-success bg-opacity-10 text-success shadow-sm mb-4" role="alert"><i class="bi bi-check-circle-fill me-2"></i>' . $_SESSION['success'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['error'])) {
                echo '<div class="container mt-4"><div class="alert alert-danger alert-custom alert-dismissible fade show border-0 bg-danger bg-opacity-10 text-danger shadow-sm mb-4" role="alert"><i class="bi bi-exclamation-triangle-fill me-2"></i>' . $_SESSION['error'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
                unset($_SESSION['error']);
            }
        ?>

        <!-- Render view spesifik dari controller -->
        <?php App\Core\App::View($content_view ?? '', $data ?? []); ?>
    </main>

    <!-- Memanggil komponen footer -->
    <?php App\Core\App::Component('footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= baseUrl('public/js/zen-pulse.js') ?>"></script>
</body>
</html>
