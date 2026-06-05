<?php

namespace Database;

class Blueprint
{
    private $table;
    private $columns = [];
    private $indexes = [];

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function id()
    {
        $this->columns[] = "id INT AUTO_INCREMENT PRIMARY KEY";
        return $this;
    }

    public function string($name, $length = 255)
    {
        $this->columns[] = "$name VARCHAR($length)";
        return $this;
    }

    public function text($name)
    {
        $this->columns[] = "$name TEXT";
        return $this;
    }

    public function integer($name)
    {
        $this->columns[] = "$name INT";
        return $this;
    }

    public function boolean($name)
    {
        $this->columns[] = "$name TINYINT(1) DEFAULT 0";
        return $this;
    }

    public function timestamps()
    {
        $this->columns[] = "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        $this->columns[] = "updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        return $this;
    }

    public function unique()
    {
        // Ambil definisi kolom terakhir yang ditambahkan dan tambahkan UNIQUE
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            $this->columns[$lastIndex] .= " UNIQUE";
        }
        return $this;
    }

    public function nullable()
    {
        // Ambil definisi kolom terakhir yang ditambahkan dan tambahkan NULL
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            $this->columns[$lastIndex] .= " NULL";
        }
        return $this;
    }

    public function default($value)
    {
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            $val = is_string($value) ? "'$value'" : $value;
            $this->columns[$lastIndex] .= " DEFAULT $val";
        }
        return $this;
    }

    public function foreignId($name)
    {
        $this->columns[] = "$name INT";
        return $this;
    }

    public function constrained($table = null, $column = 'id')
    {
        // Mendapatkan nama kolom terakhir
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0) {
            // Asumsi format kolom terakhir: "nama_kolom TIPE_DATA..."
            $parts = explode(' ', $this->columns[$lastIndex]);
            $colName = $parts[0];

            if ($table === null) {
                // Infer table name from column name (e.g. user_id -> users)
                $table = str_replace('_id', 's', $colName);
            }

            // Tambahkan sebagai constraint baru di array columns
            $this->columns[] = "FOREIGN KEY ($colName) REFERENCES $table($column)";
        }
        return $this;
    }

    public function cascadeOnDelete()
    {
        $lastIndex = count($this->columns) - 1;
        if ($lastIndex >= 0 && strpos($this->columns[$lastIndex], 'FOREIGN KEY') !== false) {
            $this->columns[$lastIndex] .= " ON DELETE CASCADE";
        }
        return $this;
    }

    public function enum($name, array $values)
    {
        $enum = "'" . implode("','", $values) . "'";
        $this->columns[] = "$name ENUM($enum)";
        return $this;
    }

    public function bigInteger($name)
    {
        $this->columns[] = "$name BIGINT";
        return $this;
    }

    public function unsignedBigInteger($name)
    {
        $this->columns[] = "$name BIGINT UNSIGNED";
        return $this;
    }

    public function decimal($name, $precision = 10, $scale = 2)
    {
        $this->columns[] = "$name DECIMAL($precision,$scale)";
        return $this;
    }

    public function float($name)
    {
        $this->columns[] = "$name FLOAT";
        return $this;
    }

    public function double($name)
    {
        $this->columns[] = "$name DOUBLE";
        return $this;
    }

    public function date($name)
    {
        $this->columns[] = "$name DATE";
        return $this;
    }

    public function datetime($name)
    {
        $this->columns[] = "$name DATETIME";
        return $this;
    }

    public function time($name)
    {
        $this->columns[] = "$name TIME";
        return $this;
    }

    public function longText($name)
    {
        $this->columns[] = "$name LONGTEXT";
        return $this;
    }

    public function json($name)
    {
        $this->columns[] = "$name JSON";
        return $this;
    }

    public function unsigned()
    {
        $lastIndex = count($this->columns) - 1;

        if ($lastIndex >= 0) {
            $this->columns[$lastIndex] .= " UNSIGNED";
        }

        return $this;
    }

    public function index($name = null)
    {
        $lastIndex = count($this->columns) - 1;

        if ($lastIndex >= 0) {
            $column = explode(' ', $this->columns[$lastIndex])[0];

            $indexName = $name ?? "{$column}_index";

            $this->indexes[] =
                "INDEX {$indexName} ({$column})";
        }

        return $this;
    }

    public function comment($text)
    {
        $lastIndex = count($this->columns) - 1;

        if ($lastIndex >= 0) {
            $this->columns[$lastIndex] .= " COMMENT '$text'";
        }

        return $this;
    }

    public function nullOnDelete()
    {
        $lastIndex = count($this->columns) - 1;

        if (
            $lastIndex >= 0 &&
            str_contains($this->columns[$lastIndex], 'FOREIGN KEY')
        ) {
            $this->columns[$lastIndex] .= " ON DELETE SET NULL";
        }

        return $this;
    }

    public function restrictOnDelete()
    {
        $lastIndex = count($this->columns) - 1;

        if (
            $lastIndex >= 0 &&
            str_contains($this->columns[$lastIndex], 'FOREIGN KEY')
        ) {
            $this->columns[$lastIndex] .= " ON DELETE RESTRICT";
        }

        return $this;
    }

    

    public function toSql()
    {
        $definitions = array_merge(
            $this->columns,
            $this->indexes
        );

        return "CREATE TABLE IF NOT EXISTS `{$this->table}` (\n    "
            . implode(",\n    ", $definitions)
            . "\n)";
    }
}
