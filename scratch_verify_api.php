<?php
$_SERVER['REQUEST_METHOD'] = 'GET';
$pages = ["installation", "cli", "api-development", "services-repositories", "zen-pulse", "testing", "routing", "controllers", "views", "database", "models", "crud", "crud-relasi", "authentication"];
require_once "app/init.php";
require_once "routes/web.php";
require_once "routes/api.php";
foreach ($pages as $p) {
    $_GET["url"] = "docs/$p";
    ob_start();
    App\Core\Route::resolve();
    $out = ob_get_clean();
    echo $p . ": " . (strpos($out, "404") === false ? "OK" : "FAIL") . "\n";
}
