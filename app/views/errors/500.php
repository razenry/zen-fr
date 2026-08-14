<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="glass-container p-5 text-center shadow-lg border-0 mb-4">
                <!-- SVG Illustration -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 180" width="160" height="120" class="mb-4">
                    <rect x="40" y="30" width="160" height="120" rx="16" fill="rgba(239, 68, 68, 0.05)" stroke="rgba(239, 68, 68, 0.2)" stroke-width="2" />
                    <!-- Alert Triangle -->
                    <path d="M120 45 L155 105 L85 105 Z" fill="none" stroke="#ef4444" stroke-width="4" stroke-linejoin="round" />
                    <!-- Exclamation point -->
                    <line x1="120" y1="65" x2="120" y2="85" stroke="#ef4444" stroke-width="4" stroke-linecap="round" />
                    <circle cx="120" cy="95" r="2.5" fill="#ef4444" />
                    <!-- Floating gears/dots -->
                    <circle cx="65" cy="55" r="4" fill="#fca5a5" />
                    <circle cx="175" cy="120" r="3" fill="#f87171" />
                </svg>

                <h1 class="display-4 fw-extrabold text-danger mb-2" style="font-weight: 800; background: linear-gradient(135deg, #ef4444, #dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">500</h1>
                <h3 class="fw-bold mb-3">Terjadi Kesalahan Server</h3>
                <p class="text-secondary mb-4 mx-auto" style="max-width: 550px;">
                    Sistem kami mendeteksi masalah internal saat memproses permintaan Anda. Jangan khawatir, detail error telah dicatat dan tim kami akan segera menanganinya.
                </p>

                <?php if(isset($exception) && $exception): ?>
                    <details class="text-start mb-4 bg-slate-900/90 border border-slate-800 rounded-2xl p-5 shadow-2xl backdrop-blur-xl" open>
                        <summary class="font-bold text-rose-400 cursor-pointer mb-2 flex justify-between items-center text-sm">
                            <span class="font-mono text-base font-bold">⚠️ <?= get_class($exception) ?>: <?= htmlspecialchars($exception->getMessage()) ?></span>
                            <span class="text-xs text-slate-500 font-mono ms-2"><?= htmlspecialchars(basename($exception->getFile())) ?>:<?= $exception->getLine() ?></span>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs font-mono text-slate-300">
                            <p class="text-slate-400 mb-2"><strong>File:</strong> <?= htmlspecialchars($exception->getFile()) ?> (Line <?= $exception->getLine() ?>)</p>
                            <pre class="bg-slate-950 p-4 rounded-xl text-rose-300 overflow-x-auto border border-slate-800/80 text-xs leading-relaxed font-mono"><code><?= htmlspecialchars($exception->getTraceAsString()) ?></code></pre>
                        </div>
                    </details>
                <?php endif; ?>

                <div class="d-flex justify-content-center gap-3">
                    <a href="<?= route('home') ?>" class="btn btn-primary rounded-pill px-4"><i class="bi bi-house-door me-2"></i>Kembali ke Beranda</a>
                    <button onclick="window.location.reload();" class="btn btn-outline-custom rounded-pill px-4"><i class="bi bi-arrow-clockwise me-1"></i>Muat Ulang Halaman</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyStackTrace() {
    var copyText = document.getElementById("stackTraceText");
    if(copyText) {
        var range = document.createRange();
        range.selectNode(copyText);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        try {
            document.execCommand("copy");
            alert("Stack trace berhasil disalin ke clipboard!");
        } catch(err) {
            console.error("Gagal menyalin text", err);
        }
        window.getSelection().removeAllRanges();
    }
}
</script>
