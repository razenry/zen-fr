<?php

namespace Database;

class Blueprint
{
    private string $table;
    private string $mode;
    private array $columns = [];
    private array $alterCommands = [];

    public function __construct(string $table, string $mode = 'create')
    {
        $this->table = $table;
        $this->mode = $mode;
    }

    public function id(): static
    {
        $this->columns[] = "id INT AUTO_INCREMENT PRIMARY KEY";
        return $this;
    }

    public function string(string $name, int $length = 255): static
    {
        $this->columns[] = "$name VARCHAR($length)";
        return $this;
    }

    public function text(string $name): static
    {
        $this->columns[] = "$name TEXT";
        return $this;
    }

    public function integer(string $name): static
    {
        $this->columns[] = "$name INT";
        return $this;
    }

    public function boolean(string $name): static
    {
        $this->columns[] = "$name TINYINT(1)";
        return $this;
    }

    public function decimal(string $name, int $total = 8, int $places = 2): static
    {
        $this->columns[] = "$name DECIMAL($total, $places)";
        return $this;
    }

    public function date(string $name): static
    {
        $this->columns[] = "$name DATE";
        return $this;
    }

    public function dateTime(string $name): static
    {
        $this->columns[] = "$name DATETIME";
        return $this;
    }

    public function json(string $name): static
    {
        $this->columns[] = "$name JSON";
        return $this;
    }

    public function timestamps(): static
    {
        $this->columns[] = "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        $this->columns[] = "updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        return $this;
    }

    public function softDeletes(string $column = 'deleted_at'): static
    {
        $this->columns[] = "$column TIMESTAMP NULL DEFAULT NULL";
        return $this;
    }

    public function unique(): static
    {
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            $this->columns[$lastIndex] .= " UNIQUE";
        }
        return $this;
    }

    public function nullable(): static
    {
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            $this->columns[$lastIndex] .= " NULL";
        }
        return $this;
    }

    public function default(mixed $value): static
    {
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            $val = is_string($value) ? "'$value'" : (is_bool($value) ? ($value ? '1' : '0') : $value);
            $this->columns[$lastIndex] .= " DEFAULT $val";
        }
        return $this;
    }

    public function foreignId(string $name): static
    {
        $this->columns[] = "$name INT";
        return $this;
    }

    public function constrained(?string $table = null, string $column = 'id'): static
    {
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            $parts = explode(' ', $this->columns[$lastIndex]);
            $colName = $parts[0];
            
            if ($table === null) {
                $table = str_replace('_id', 's', $colName);
            }
            
            $this->columns[] = "FOREIGN KEY ($colName) REFERENCES $table($column)";
        }
        return $this;
    }

    public function cascadeOnDelete(): static
    {
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0 && strpos($this->columns[$lastIndex], 'FOREIGN KEY') !== false) {
            $this->columns[$lastIndex] .= " ON DELETE CASCADE";
        }
        return $this;
    }

    public function dropColumn(string $column): static
    {
        $this->alterCommands[] = "DROP COLUMN `$column`";
        return $this;
    }

    public function toSql(): string
    {
        if ($this->mode === 'alter') {
            $parts = [];
            foreach ($this->columns as $col) {
                $parts[] = "ADD COLUMN $col";
            }
            foreach ($this->alterCommands as $cmd) {
                $parts[] = $cmd;
            }
            if (empty($parts)) return '';
            return "ALTER TABLE `{$this->table}`\n    " . implode(",\n    ", $parts);
        }

        return "CREATE TABLE IF NOT EXISTS `{$this->table}` (\n    " . implode(",\n    ", $this->columns) . "\n)";
    }
}
