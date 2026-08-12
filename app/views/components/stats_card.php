<div class="card card-premium h-100 border-0 shadow-sm p-4 text-center">
    <div class="d-inline-flex align-items-center justify-content-center mx-auto mb-3 rounded-circle bg-<?= $color ?? 'primary' ?> bg-opacity-10 text-<?= $color ?? 'primary' ?>" style="width: 54px; height: 54px; font-size: 1.5rem;">
        <i class="<?= $icon ?? 'bi bi-app' ?>"></i>
    </div>
    <h3 class="fw-extrabold text-dark mb-1" style="font-weight: 800;"><?= htmlspecialchars($value ?? '0') ?></h3>
    <p class="text-secondary small mb-0 fw-medium"><?= htmlspecialchars($label ?? 'Metric') ?></p>
</div>
