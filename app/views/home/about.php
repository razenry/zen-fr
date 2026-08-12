<div class="container py-4">
    <!-- Header Banner -->
    <div class="card border-0 shadow-sm rounded-4 p-5 mb-5 text-center" style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: 1px solid #e5e7eb !important;">
        <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill bg-primary bg-opacity-10 text-primary fw-semibold small shadow-sm mb-3 mx-auto">
            <i class="bi bi-person-workspace"></i>
            <span><?= lang('about_badge') ?></span>
        </div>

        <h1 class="display-5 fw-extrabold mb-3 text-dark" style="font-weight: 800; letter-spacing: -0.03em;">
            <?= lang('about_title') ?>
        </h1>
        <p class="lead text-secondary max-w-2xl mx-auto mb-0" style="max-width: 750px; font-size: 1.15rem; line-height: 1.7;">
            <?= lang('about_lead') ?>
        </p>
    </div>

    <!-- Creator & History Grid -->
    <div class="row g-4 mb-5">
        <!-- Creator Card -->
        <div class="col-lg-4">
            <div class="card card-premium p-4 h-100 border text-center">
                <div class="profile-avatar text-white rounded-circle d-flex align-items-center justify-content-center fw-bold mx-auto mb-3 shadow" style="width: 80px; height: 80px; font-size: 2rem; background: #4f46e5;">
                    R
                </div>
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill fw-semibold mb-2 mx-auto small">
                    <?= lang('about_creator_label') ?>
                </span>
                <h3 class="fw-bold text-dark mb-1"><?= lang('about_creator_name') ?></h3>
                <p class="text-secondary small mb-4"><?= lang('about_creator_title') ?></p>
                <hr class="my-3">
                <p class="text-secondary small mb-0 text-start" style="line-height: 1.7;">
                    <?= lang('about_creator_bio') ?>
                </p>
            </div>
        </div>

        <!-- History & Philosophy Card -->
        <div class="col-lg-8">
            <div class="card card-premium p-4 h-100 border">
                <h4 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                    <i class="bi bi-hourglass-split text-primary"></i>
                    <?= lang('about_history_title') ?>
                </h4>
                <p class="text-secondary mb-4" style="line-height: 1.8; font-size: 1.05rem;">
                    <?= lang('about_history_body') ?>
                </p>

                <h5 class="fw-bold text-dark mb-3"><i class="bi bi-layers text-primary me-2"></i> <?= lang('about_blend_title') ?></h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-box me-1 text-primary"></i> <?= lang('about_laravel_title') ?></h6>
                            <p class="small text-secondary mb-0"><?= lang('about_laravel_desc') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-activity me-1 text-success"></i> <?= lang('about_livewire_title') ?></h6>
                            <p class="small text-secondary mb-0"><?= lang('about_livewire_desc') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-diagram-3 me-1 text-info"></i> <?= lang('about_pattern_title') ?></h6>
                            <p class="small text-secondary mb-0"><?= lang('about_pattern_desc') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-shield-check me-1 text-danger"></i> <?= lang('about_pest_title') ?></h6>
                            <p class="small text-secondary mb-0"><?= lang('about_pest_desc') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
