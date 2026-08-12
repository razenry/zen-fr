<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= route('home') ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: #4f46e5"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            <span>Zen <strong>PHP</strong></span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= route('home') ?>"><?= lang('home', 'Beranda') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= route('about') ?>"><?= lang('about', 'Tentang') ?></a>
                </li>
            </ul>
            
            <ul class="navbar-nav align-items-center gap-2">
                <!-- Language Switcher Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-1 border px-2.5 py-1 rounded-3" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe me-1 text-primary"></i>
                        <span class="text-uppercase fw-bold small"><?= \App\Core\Lang::getLocale() ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 rounded-3" aria-labelledby="langDropdown">
                        <li><a class="dropdown-item py-2 d-flex align-items-center justify-content-between" href="<?= route('lang.switch', ['code' => 'id']) ?>"><span>Bahasa Indonesia</span> <?= \App\Core\Lang::getLocale() === 'id' ? '<i class="bi bi-check-lg text-primary ms-2"></i>' : '' ?></a></li>
                        <li><a class="dropdown-item py-2 d-flex align-items-center justify-content-between" href="<?= route('lang.switch', ['code' => 'en']) ?>"><span>English</span> <?= \App\Core\Lang::getLocale() === 'en' ? '<i class="bi bi-check-lg text-primary ms-2"></i>' : '' ?></a></li>
                        <li><a class="dropdown-item py-2 d-flex align-items-center justify-content-between" href="<?= route('lang.switch', ['code' => 'ja']) ?>"><span>Japanese (日本語)</span> <?= \App\Core\Lang::getLocale() === 'ja' ? '<i class="bi bi-check-lg text-primary ms-2"></i>' : '' ?></a></li>
                    </ul>
                </li>

                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold me-2" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
                            </div>
                            <span><?= htmlspecialchars($_SESSION['user_name']) ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 rounded-3" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item py-2 text-danger d-flex align-items-center" href="<?= route('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i> <?= lang('logout', 'Keluar') ?></a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= route('login') ?>"><?= lang('login', 'Masuk') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm ms-lg-2 px-3 py-1.5 rounded-pill" href="<?= route('register') ?>"><?= lang('register', 'Daftar') ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
