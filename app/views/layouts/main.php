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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script>window.ZEN_BASE_URL = "<?= function_exists('baseUrl') ? baseUrl('') : '/' ?>";</script>
    <?= \App\Core\App::Vite(['resources/css/app.css', 'resources/js/app.jsx']) ?>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col font-sans">
    
    <!-- Memanggil komponen header -->
    <?php \App\Core\App::Component('header', ['title' => $title ?? 'Zen PHP']); ?>

    <main class="flex-grow">
        <?php 
            if (isset($_SESSION['success'])) {
                echo '<div class="max-w-7xl mx-auto px-4 mt-4"><div class="p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl shadow-lg mb-4 flex items-center gap-3"><span class="text-xl">✓</span>' . $_SESSION['success'] . '</div></div>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['error'])) {
                echo '<div class="max-w-7xl mx-auto px-4 mt-4"><div class="p-4 bg-rose-500/10 border border-rose-500/30 text-rose-400 rounded-xl shadow-lg mb-4 flex items-center gap-3"><span class="text-xl">⚠️</span>' . $_SESSION['error'] . '</div></div>';
                unset($_SESSION['error']);
            }
        ?>

        <!-- Render view spesifik dari controller -->
        <?php 
            if (isset($content_html)) {
                echo $content_html;
            } elseif (isset($content_view) && !empty($content_view)) {
                \App\Core\App::View($content_view, $data ?? []);
            }
        ?>
    </main>

    <!-- Memanggil komponen footer -->
    <?php \App\Core\App::Component('footer'); ?>

    <script src="<?= function_exists('baseUrl') ? baseUrl('public/js/zen-pulse.js') : '/public/js/zen-pulse.js' ?>"></script>
</body>
</html>
