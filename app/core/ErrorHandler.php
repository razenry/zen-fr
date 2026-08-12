<?php

namespace App\Core;

use Throwable;

class ErrorHandler
{
    public static function register(): void
    {
        error_reporting(E_ALL);
        set_error_handler([self::class, 'handleError']);
        set_exception_handler([self::class, 'handleException']);
    }

    public static function handleError($level, $message, $file = '', $line = 0): void
    {
        if (error_reporting() & $level) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function handleException(Throwable $e): void
    {
        $isDebug = strtolower((string)getenv('APP_DEBUG')) === 'true' || getenv('APP_DEBUG') === '1';
        http_response_code(500);

        if (!$isDebug) {
            if (!headers_sent()) {
                header('Content-Type: text/html; charset=UTF-8');
            }
            if (file_exists(dirname(__DIR__) . '/views/errors/500.php')) {
                require dirname(__DIR__) . '/views/errors/500.php';
            } else {
                echo '<h1>500 Internal Server Error</h1>';
            }
            exit;
        }

        // Render interactive debug error page
        $class = get_class($e);
        $message = htmlspecialchars($e->getMessage());
        $file = htmlspecialchars($e->getFile());
        $line = $e->getLine();
        $trace = $e->getTrace();

        // Get preview lines of code around error
        $snippet = self::getCodeSnippet($e->getFile(), $line);

        echo '<!DOCTYPE html>';
        echo '<html lang="en"><head><meta charset="UTF-8"><title>' . $class . ': ' . $message . '</title>';
        echo '<style>';
        echo 'body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;background:#0f172a;color:#f8fafc;padding:2rem;}';
        echo '.container{max-width:1100px;margin:0 auto;background:#1e293b;border-radius:12px;box-shadow:0 20px 25px -5px rgba(0,0,0,0.5);overflow:hidden;border:1px solid #334155;}';
        echo '.header{padding:2rem;background:#475569;border-bottom:1px solid #334155;}';
        echo '.badge{display:inline-block;padding:0.25rem 0.75rem;background:#ef4444;color:#fff;font-weight:700;font-size:0.75rem;border-radius:9999px;margin-bottom:0.75rem;text-transform:uppercase;}';
        echo '.title{font-size:1.5rem;font-weight:800;color:#f8fafc;margin:0 0 0.5rem 0;}';
        echo '.file-info{font-family:monospace;color:#94a3b8;font-size:0.9rem;}';
        echo '.code-box{background:#090d16;padding:1.5rem;overflow-x:auto;font-family:monospace;font-size:0.9rem;line-height:1.6;}';
        echo '.code-line{display:flex;padding:0.1rem 0;}';
        echo '.code-line.active{background:rgba(239,68,68,0.25);border-left:4px solid #ef4444;font-weight:bold;}';
        echo '.line-num{width:50px;color:#64748b;text-align:right;padding-right:1rem;user-select:none;}';
        echo '.line-code{color:#e2e8f0;white-space:pre;}';
        echo '.trace-box{padding:2rem;background:#1e293b;}';
        echo '.trace-title{font-size:1.1rem;font-weight:700;margin-bottom:1rem;color:#cbd5e1;}';
        echo '.trace-item{padding:0.75rem 1rem;background:#0f172a;border-radius:6px;margin-bottom:0.5rem;font-family:monospace;font-size:0.85rem;color:#94a3b8;border:1px solid #334155;}';
        echo '.trace-func{color:#38bdf8;font-weight:bold;}';
        echo '</style></head><body>';

        echo '<div class="container">';
        echo '<div class="header">';
        echo '<span class="badge">' . htmlspecialchars($class) . '</span>';
        echo '<h1 class="title">' . $message . '</h1>';
        echo '<div class="file-info">In <strong>' . $file . '</strong> at line <strong>' . $line . '</strong></div>';
        echo '</div>';

        if (!empty($snippet)) {
            echo '<div class="code-box">';
            foreach ($snippet as $lNum => $lCode) {
                $isActive = ($lNum === $line) ? ' active' : '';
                echo '<div class="code-line' . $isActive . '">';
                echo '<span class="line-num">' . $lNum . '</span>';
                echo '<span class="line-code">' . htmlspecialchars($lCode) . '</span>';
                echo '</div>';
            }
            echo '</div>';
        }

        echo '<div class="trace-box">';
        echo '<div class="trace-title">Stack Trace</div>';
        foreach ($trace as $i => $item) {
            $f = htmlspecialchars($item['file'] ?? 'unknown');
            $l = $item['line'] ?? 0;
            $fn = htmlspecialchars(($item['class'] ?? '') . ($item['type'] ?? '') . ($item['function'] ?? ''));
            echo '<div class="trace-item">#' . $i . ' <span class="trace-func">' . $fn . '</span> at ' . $f . ':' . $l . '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</body></html>';
        exit;
    }

    private static function getCodeSnippet($filePath, $line, $padding = 6): array
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            return [];
        }

        $lines = file($filePath);
        $start = max(0, $line - $padding - 1);
        $length = ($line + $padding) - $start;

        $slice = array_slice($lines, $start, $length, true);
        $result = [];
        foreach ($slice as $idx => $code) {
            $result[$idx + 1] = rtrim($code);
        }
        return $result;
    }
}
