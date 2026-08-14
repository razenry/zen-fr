<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Hero Banner (TailwindCSS v4 Dark/Sleek Theme) -->
    <div class="relative bg-slate-900/90 border border-slate-800 rounded-3xl p-8 md:p-12 text-center shadow-2xl overflow-hidden mb-10 backdrop-blur-xl">
        <div class="absolute -top-24 -left-24 w-72 h-72 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-wrap justify-center items-center gap-2 mb-6">
            <?php App\Core\App::Component('feature_badge', ['text' => 'PHP 8.0+ Ready', 'icon' => 'bi bi-lightning-charge-fill']); ?>
            <?php App\Core\App::Component('feature_badge', ['text' => 'Service & Repository Pattern', 'icon' => 'bi bi-diagram-3-fill']); ?>
            <?php App\Core\App::Component('feature_badge', ['text' => 'Zen Pulse Reactive Engine', 'icon' => 'bi bi-activity']); ?>
            <?php App\Core\App::Component('feature_badge', ['text' => 'TailwindCSS v4 Native Engine', 'icon' => 'bi bi-palette-fill']); ?>
            
            <div class="inline-flex items-center px-3.5 py-1 bg-slate-950 border border-slate-800 text-sky-400 font-mono text-xs font-bold rounded-full shadow-inner">
                v8.3.0 Latest Release
            </div>
        </div>
        
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-black tracking-tight text-white mb-4">
            <?= lang('hero_title', 'Zen PHP Framework') ?>
        </h1>
        <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto mb-8 leading-relaxed">
            <?= lang('hero_subtitle', 'Framework PHP modern ultra-ringan dengan arsitektur MVC enterprise, Service-Repository Pattern, TailwindCSS v4, React 18 SPA Engine & Zen Pulse Live Reactive Components.') ?>
        </p>

        <div class="flex flex-wrap justify-center gap-4">
            <a href="https://github.com/razenry/zen-fr/tree/docs" target="_blank" class="px-6 py-3.5 bg-sky-500 hover:bg-sky-400 text-slate-950 font-extrabold rounded-2xl shadow-lg shadow-sky-500/25 transition active:scale-95 flex items-center gap-2">
                <i class="bi bi-book-half"></i> <?= lang('btn_docs', 'Buka Dokumentasi') ?>
            </a>
            <a href="<?= route('docs') ?>" class="px-6 py-3.5 bg-slate-800 hover:bg-slate-700 text-white font-bold rounded-2xl border border-slate-700 transition active:scale-95 flex items-center gap-2">
                <i class="bi bi-code-slash"></i> Swagger UI (/docs)
            </a>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
        <?php App\Core\App::Component('stats_card', ['value' => '0.21s', 'label' => lang('stat_speed', 'Ultra Fast Execution'), 'icon' => 'bi bi-speedometer2', 'color' => 'success']); ?>
        <?php App\Core\App::Component('stats_card', ['value' => '100%', 'label' => lang('stat_pattern', 'Service-Repository MVC'), 'icon' => 'bi bi-diagram-3', 'color' => 'primary']); ?>
        <?php App\Core\App::Component('stats_card', ['value' => 'v4.0', 'label' => 'TailwindCSS Native Engine', 'icon' => 'bi bi-palette', 'color' => 'warning']); ?>
        <?php App\Core\App::Component('stats_card', ['value' => 'React 18', 'label' => 'Vite HMR & SPA Support', 'icon' => 'bi bi-cpu', 'color' => 'danger']); ?>
    </div>

    <!-- Features & Preset Info -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl backdrop-blur-sm hover:border-sky-500/40 transition">
            <div class="w-12 h-12 rounded-xl bg-sky-500/10 text-sky-400 font-bold text-2xl flex items-center justify-center mb-4">⚡</div>
            <h3 class="text-xl font-bold text-white mb-2">Preset: React 18</h3>
            <p class="text-slate-400 text-sm mb-4">Jalankan <code class="text-sky-400 font-mono">php zen preset:react</code> untuk mengaktifkan React 18 + Vite HMR SPA Engine.</p>
            <span class="text-xs font-mono text-slate-500">npm run dev • http://localhost:5173</span>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl backdrop-blur-sm hover:border-indigo-500/40 transition">
            <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-400 font-bold text-2xl flex items-center justify-center mb-4">🔥</div>
            <h3 class="text-xl font-bold text-white mb-2">Preset: Zen Pulse</h3>
            <p class="text-slate-400 text-sm mb-4">Jalankan <code class="text-indigo-400 font-mono">php zen preset:pulse</code> untuk komputasi Blade reaktif tanpa JS berlebih.</p>
            <span class="text-xs font-mono text-slate-500">Zero Dependencies • High Speed</span>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl backdrop-blur-sm hover:border-emerald-500/40 transition">
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 font-bold text-2xl flex items-center justify-center mb-4">🌐</div>
            <h3 class="text-xl font-bold text-white mb-2">Preset: REST API</h3>
            <p class="text-slate-400 text-sm mb-4">Jalankan <code class="text-emerald-400 font-mono">php zen preset:api</code> untuk RESTful Backend + Swagger UI at <code class="text-emerald-400 font-mono">/docs</code>.</p>
            <span class="text-xs font-mono text-slate-500">Bearer Auth • CORS Enabled</span>
        </div>
    </div>
</div>
