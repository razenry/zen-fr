<?php

namespace Database;

class MigrationRunner
{
    protected Database $db;
    protected string $migrationsPath;

    public function __construct(?string $path = null)
    {
        $this->db = new Database();
        $this->migrationsPath = $path ?? (dirname(__DIR__) . '/database/migrations');
        $this->ensureMigrationTableExists();
    }

    /**
     * Ensure the tracking 'migrations' table exists.
     */
    protected function ensureMigrationTableExists(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS `migrations` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `migration` VARCHAR(255) NOT NULL,
            `batch` INT NOT NULL,
            `executed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $this->db->query($sql);
        $this->db->execute();
    }

    /**
     * Get array of already executed migration names.
     */
    public function getExecutedMigrations(): array
    {
        $this->db->query("SELECT `migration` FROM `migrations` ORDER BY `id` ASC");
        $rows = $this->db->resultSet();
        return array_column($rows, 'migration');
    }

    /**
     * Get current highest batch number.
     */
    public function getNextBatchNumber(): int
    {
        $this->db->query("SELECT MAX(`batch`) as max_batch FROM `migrations`");
        $row = $this->db->single();
        return ((int)($row['max_batch'] ?? 0)) + 1;
    }

    /**
     * Run all pending migrations.
     */
    public function run(): array
    {
        if (!file_exists($this->migrationsPath)) {
            mkdir($this->migrationsPath, 0777, true);
            return [];
        }

        $executed = $this->getExecutedMigrations();
        $files = glob($this->migrationsPath . '/*.php');
        sort($files);

        $pendingFiles = array_filter($files, function ($file) use ($executed) {
            $baseName = basename($file, '.php');
            return !in_array($baseName, $executed, true);
        });

        if (empty($pendingFiles)) {
            return [];
        }

        $batch = $this->getNextBatchNumber();
        $ran = [];

        foreach ($pendingFiles as $file) {
            $baseName = basename($file, '.php');
            require_once $file;

            $className = $this->resolveClassName($file, $baseName);
            if (class_exists($className)) {
                $instance = new $className();
                if (method_exists($instance, 'up')) {
                    $instance->up();
                }

                $this->db->query("INSERT INTO `migrations` (`migration`, `batch`) VALUES (:migration, :batch)");
                $this->db->bind(':migration', $baseName);
                $this->db->bind(':batch', $batch);
                $this->db->execute();

                $ran[] = $baseName;
            }
        }

        return $ran;
    }

    /**
     * Rollback the last migration batch.
     */
    public function rollback(): array
    {
        $this->db->query("SELECT MAX(`batch`) as max_batch FROM `migrations`");
        $row = $this->db->single();
        $lastBatch = (int)($row['max_batch'] ?? 0);

        if ($lastBatch === 0) {
            return [];
        }

        $this->db->query("SELECT `migration` FROM `migrations` WHERE `batch` = :batch ORDER BY `id` DESC");
        $this->db->bind(':batch', $lastBatch);
        $rows = $this->db->resultSet();
        $rolledBack = [];

        foreach ($rows as $row) {
            $baseName = $row['migration'];
            $file = $this->migrationsPath . '/' . $baseName . '.php';

            if (file_exists($file)) {
                require_once $file;
                $className = $this->resolveClassName($file, $baseName);
                if (class_exists($className)) {
                    $instance = new $className();
                    if (method_exists($instance, 'down')) {
                        $instance->down();
                    }
                }
            }

            $this->db->query("DELETE FROM `migrations` WHERE `migration` = :migration");
            $this->db->bind(':migration', $baseName);
            $this->db->execute();

            $rolledBack[] = $baseName;
        }

        return $rolledBack;
    }

    /**
     * Reset all migrations.
     */
    public function reset(): array
    {
        $rolledBack = [];
        while (!empty($batchRollback = $this->rollback())) {
            $rolledBack = array_merge($rolledBack, $batchRollback);
        }
        return $rolledBack;
    }

    /**
     * Return migration status.
     */
    public function status(): array
    {
        $executed = [];
        $this->db->query("SELECT `migration`, `batch`, `executed_at` FROM `migrations` ORDER BY `id` ASC");
        foreach ($this->db->resultSet() as $row) {
            $executed[$row['migration']] = $row;
        }

        $files = glob($this->migrationsPath . '/*.php');
        sort($files);

        $statusList = [];
        foreach ($files as $file) {
            $baseName = basename($file, '.php');
            if (isset($executed[$baseName])) {
                $statusList[] = [
                    'migration' => $baseName,
                    'ran' => true,
                    'batch' => $executed[$baseName]['batch'],
                    'executed_at' => $executed[$baseName]['executed_at'],
                ];
            } else {
                $statusList[] = [
                    'migration' => $baseName,
                    'ran' => false,
                    'batch' => null,
                    'executed_at' => null,
                ];
            }
        }

        return $statusList;
    }

    protected function resolveClassName(string $file, string $baseName): string
    {
        // Strip timestamp prefix if present (e.g. 2026_08_14_000000_create_users_table -> CreateUsersTable)
        $cleanName = preg_replace('/^\d{4}_\d{2}_\d{2}_\d{6}_/', '', $baseName);
        $studly = str_replace(' ', '', ucwords(str_replace('_', ' ', $cleanName)));

        if (class_exists($studly)) {
            return $studly;
        }

        if (class_exists("Database\\Migrations\\{$studly}")) {
            return "Database\\Migrations\\{$studly}";
        }

        return $studly;
    }
}
