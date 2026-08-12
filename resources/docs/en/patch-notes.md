# Patch Notes & Version Upgrade Procedure (v2.0 Release)

Welcome to the official release notes for **Zen PHP Framework v2.0 Enterprise Release**. This release summarizes performance enhancements (BUFF), codebase purge (NERF), system adjustments (ADJUSTMENT), and major new features (NEW MAJOR FEATURES).

---

## Release Patch Notes Summary (v2.0 Release)

<div class="p-3 mb-3 bg-success bg-opacity-10 border border-success rounded-3">
    <h5 class="fw-bold text-success m-0"><i class="bi bi-check-circle-fill me-2"></i> NEW: MAJOR FEATURES RELEASE</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Database Seeder Engine (<code>php zen db:seed</code>)</strong>: Automated database seeder tool for populating sample and master data.</li>
        <li><strong>Enterprise Service & Repository Pattern</strong>: Standardized architecture separating business logic from data access.</li>
        <li><strong>Triple Language Engine (i18n)</strong>: Unified language switcher supporting Indonesian, English, and Japanese across app and docs.</li>
        <li><strong>CLI Utilities <code>zen clear</code> & <code>zen optimize</code></strong>: Instant cache clearing and production autoload optimization.</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-primary bg-opacity-10 border border-primary rounded-3">
    <h5 class="fw-bold text-primary m-0"><i class="bi bi-lightning-charge-fill me-2"></i> BUFF: PERFORMANCE ENHANCEMENTS</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Pest PHP Test Suite Speed (0.21s)</strong>: Accelerated test suite execution down to 0.21 seconds.</li>
        <li><strong>Zen Pulse Reactivity (Zero-Dependency)</strong>: Instant <code>zen-click</code> and <code>zen-model</code> reactivity without Node.js or Pusher.</li>
        <li><strong>Subfolder <code>baseUrl</code> Auto-Resolution</strong>: Dynamic URL resolution for subfolder hosting environments (Laragon/Apache).</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-danger bg-opacity-10 border border-danger rounded-3">
    <h5 class="fw-bold text-danger m-0"><i class="bi bi-x-circle-fill me-2"></i> NERF: CODEBASE PURGE & DEPRECATION</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Monolithic Legacy Purge</strong>: Completely removed old monolithic post controllers and views to reduce codebase footprint.</li>
        <li><strong>Bloat Dependency Removal</strong>: Stripped unnecessary third-party packages for ultra-lightweight speed.</li>
    </ul>
</div>

<div class="p-3 mb-3 bg-warning bg-opacity-10 border border-warning rounded-3">
    <h5 class="fw-bold text-dark m-0"><i class="bi bi-sliders me-2"></i> ADJUSTMENT: SYSTEM REFACTORING</h5>
    <ul class="mb-0 mt-2 text-dark small">
        <li><strong>Unified Header Layout</strong>: 100% unified navbar UI and language dropdown between docs and main application.</li>
        <li><strong>Focus Retention Live Input</strong>: Preserves cursor position and focus state while typing on reactive components.</li>
    </ul>
</div>

---

## Version Upgrade Procedure via Composer

If you installed `razenry/zen-php` previously via Composer, follow these steps to upgrade your project to v2.0:

### Step 1: Update Composer Package
Open your terminal and run:

```bash
composer update razenry/zen-php
```

### Step 2: Clear Temporary Caches
Clear session buffers and temporary files:

```bash
php zen clear
```

### Step 3: Run Database Migrations
Ensure the latest database schema is migrated:

```bash
php zen migrate
```

### Step 4: Populate Data via Database Seeder
Seed initial master data and sample records:

```bash
php zen db:seed
```

### Step 5: Optimize Framework Performance
Optimize classmaps and configuration for production:

```bash
php zen optimize
```

Your Zen PHP Framework project is now upgraded to v2.0 Enterprise Release.
