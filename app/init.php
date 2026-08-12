<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\DotEnv;

// Load Environment Variables
$env = new DotEnv(dirname(__DIR__) . '/.env');
$env->load();

// Set Timezone
date_default_timezone_set('Asia/Jakarta');

// Include Config & i18n Translation Engine
require_once 'core/Config.php';
require_once 'core/Lang.php';

// Initialize i18n
\App\Core\Lang::init();
