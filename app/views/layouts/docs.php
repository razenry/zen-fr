<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Zen PHP Documentation' ?></title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Syntax Highlighting (PrismJS) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <!-- Custom Style CSS -->
    <link href="<?= baseUrl('public/css/style.css') ?>" rel="stylesheet">
    
    <script>window.ZEN_BASE_URL = "<?= baseUrl('') ?>";</script>

    <style>
        :root {
            --docs-primary: #4f46e5;
            --docs-primary-hover: #4338ca;
            --docs-text: #374151;
            --docs-text-light: #6b7280;
            --docs-bg: #ffffff;
            --docs-bg-alt: #f9fafb;
            --docs-border: #e5e7eb;
            --docs-sidebar-w: 280px;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--docs-text);
            background-color: var(--docs-bg);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* Layout */
        .docs-container {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        /* Sidebar */
        .docs-sidebar {
            width: var(--docs-sidebar-w);
            position: fixed;
            top: 65px;
            bottom: 0;
            left: 0;
            overflow-y: auto;
            border-right: 1px solid rgba(229, 231, 235, 0.8);
            padding: 2.5rem 1.5rem;
            background: rgba(249, 250, 251, 0.95);
            backdrop-filter: blur(20px);
            z-index: 40;
        }

        /* Custom Scrollbar for Sidebar */
        .docs-sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .docs-sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        .docs-sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        .docs-sidebar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .sidebar-section {
            margin-bottom: 2.25rem;
        }

        .sidebar-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 800;
            color: #94a3b8;
            margin-bottom: 1rem;
            padding-left: 0.5rem;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            margin-bottom: 0.25rem;
        }

        .sidebar-nav a {
            text-decoration: none;
            color: #475569;
            font-size: 0.9rem;
            font-weight: 500;
            display: block;
            padding: 0.4rem 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .sidebar-nav a:hover {
            background: #e2e8f0;
            color: #0f172a;
            transform: translateX(3px);
        }

        .sidebar-nav a.active {
            color: var(--docs-primary);
            background: #eef2ff;
            font-weight: 600;
            box-shadow: inset 3px 0 0 var(--docs-primary);
        }

        /* Main Content */
        .docs-main {
            flex: 1;
            margin-left: var(--docs-sidebar-w);
            padding: 4rem 3rem;
            max-width: 880px;
        }

        /* Typography & Markdown Styles */
        .prose h1 {
            font-size: 2.75rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 1.5rem;
            letter-spacing: -0.03em;
            line-height: 1.2;
        }

        .prose h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            margin-top: 3.5rem;
            margin-bottom: 1.25rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--docs-border);
            letter-spacing: -0.01em;
        }

        .prose h3 {
            font-size: 1.35rem;
            font-weight: 600;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            color: #334155;
        }

        .prose p {
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
            color: #475569;
            line-height: 1.7;
        }

        .prose a {
            color: var(--docs-primary);
            text-decoration: none;
            font-weight: 500;
            border-bottom: 1px solid transparent;
            transition: border-color 0.2s;
        }

        .prose a:hover {
            border-color: var(--docs-primary);
        }

        .prose ul, .prose ol {
            margin-bottom: 1.5rem;
            padding-left: 1.75rem;
            font-size: 1.05rem;
            color: #475569;
        }

        .prose li {
            margin-bottom: 0.5rem;
        }

        /* Inline Code */
        .prose code {
            font-family: 'Fira Code', monospace;
            background: #f1f5f9;
            padding: 0.2em 0.4em;
            border-radius: 0.375rem;
            font-size: 0.875em;
            color: #db2777;
            font-weight: 500;
            border: 1px solid #e2e8f0;
        }
        
        /* Prism overrides */
        .prose pre {
            border-radius: 0.75rem;
            margin-bottom: 2rem;
            background: #0f172a !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 1.25rem 1.5rem !important;
            overflow-x: auto;
        }
        
        .prose pre code {
            background: transparent;
            padding: 0;
            color: #f8fafc;
            font-size: 0.9em;
            border: none;
            font-weight: 400;
        }

        .prose blockquote {
            border-left: 4px solid var(--docs-primary);
            background: linear-gradient(to right, #eef2ff, #f8fafc);
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            border-radius: 0 0.75rem 0.75rem 0;
            color: #475569;
            font-style: italic;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        
        .prose blockquote p:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .docs-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                background: white;
            }

            .docs-sidebar.open {
                transform: translateX(0);
                box-shadow: 4px 0 24px rgba(0,0,0,0.1);
            }

            .docs-main {
                margin-left: 0;
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Unified Shared Header Component -->
    <?php \App\Core\App::Component('header', ['title' => $title ?? 'Zen PHP Docs']); ?>

    <div class="docs-container">
        <!-- Sidebar -->
        <aside class="docs-sidebar" id="sidebar">
            <?php foreach ($sidebar as $section): ?>
                <div class="sidebar-section">
                    <h3 class="sidebar-title"><?= htmlspecialchars($section['title']) ?></h3>
                    <ul class="sidebar-nav">
                        <?php foreach ($section['items'] as $item): ?>
                            <li>
                                <a href="<?= route('docs.show', ['page' => $item['path']]) ?>" 
                                   class="<?= ($currentPage === $item['path']) ? 'active' : '' ?>">
                                    <?= htmlspecialchars($item['title']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </aside>

        <!-- Main Content -->
        <main class="docs-main">
            <div class="prose">
                <?= $content ?>
            </div>
            
            <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--docs-border); display: flex; justify-content: space-between; align-items: center;">
                <p style="color: var(--docs-text-light); font-size: 0.875rem;">
                    &copy; <?= date('Y') ?> Zen PHP Framework. MIT License.
                </p>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Syntax Highlighting Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-bash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
</body>
</html>
