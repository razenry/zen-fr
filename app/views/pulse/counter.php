<div class="card card-premium border shadow-sm p-4 rounded-4">
    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success p-1.5 rounded-circle"></span>
            <h5 class="fw-bold text-dark m-0"><?= lang('counter_title') ?></h5>
        </div>
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill small font-monospace">App\Pulse\Counter</span>
    </div>

    <!-- Live Model Binding Input -->
    <div class="mb-3">
        <label class="form-label small fw-semibold text-secondary mb-1"><?= lang('counter_label_input') ?></label>
        <div class="input-group">
            <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-person"></i></span>
            <input type="text" zen-model="name" value="<?= htmlspecialchars($name) ?>" class="form-control bg-light border-start-0" placeholder="<?= lang('counter_placeholder') ?>">
        </div>
    </div>

    <p class="text-secondary small mb-3">
        <?= lang('counter_greeting') ?> <strong class="text-primary"><?= htmlspecialchars($name) ?></strong>! <?= lang('counter_current_val') ?>
    </p>

    <!-- Big Number Display -->
    <div class="text-center py-3 my-2 bg-light rounded-3 border">
        <div class="display-3 fw-extrabold text-primary font-monospace" style="font-weight: 800;">
            <?= (int) $count ?>
        </div>
    </div>

    <!-- Interactive Action Buttons -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
        <button type="button" zen-click="decrement(1)" class="btn btn-outline-danger px-3 py-2 fw-semibold rounded-3">
            <i class="bi bi-dash-circle me-1"></i> <?= lang('btn_decrement') ?>
        </button>
        <button type="button" zen-click="resetCount" class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-3">
            <i class="bi bi-arrow-counterclockwise me-1"></i> <?= lang('btn_reset') ?>
        </button>
        <button type="button" zen-click="increment(1)" class="btn btn-primary px-3 py-2 fw-semibold rounded-3 shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> <?= lang('btn_increment') ?>
        </button>
        <button type="button" zen-click="increment(5)" class="btn btn-outline-success px-3 py-2 fw-semibold rounded-3">
            <i class="bi bi-lightning-charge me-1"></i> <?= lang('btn_rocket') ?>
        </button>
    </div>
</div>
