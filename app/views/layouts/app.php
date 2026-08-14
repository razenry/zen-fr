<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Zen PHP React App' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <script>window.ZEN_BASE_URL = "<?= function_exists('baseUrl') ? baseUrl('') : '/' ?>";</script>
    <?= \App\Core\App::Vite() ?>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen">
    <?php 
        if (isset($content_html)) {
            echo $content_html;
        } elseif (isset($content_view) && !empty($content_view)) {
            \App\Core\App::View($content_view, $data ?? []);
        }
    ?>
</body>
</html>
