<?php

namespace Database;

class Schema
{
    public static function create($table, callable $callback)
    {
        $blueprint = new Blueprint($table);
        $callback($blueprint);
        
        $sql = $blueprint->toSql();
        $db = new Database();
        $db->query($sql);
        return $db->execute();
    }

    public static function table($table, callable $callback)
    {
        $blueprint = new Blueprint($table, 'alter');
        $callback($blueprint);

        $sql = $blueprint->toSql();
        if (!empty($sql)) {
            $db = new Database();
            $db->query($sql);
            return $db->execute();
        }
        return true;
    }

    public static function drop($table)
    {
        $sql = "DROP TABLE `$table`";
        $db = new Database();
        $db->query($sql);
        return $db->execute();
    }

    public static function dropIfExists($table)
    {
        $sql = "DROP TABLE IF EXISTS `$table`";
        $db = new Database();
        $db->query($sql);
        return $db->execute();
    }

    public static function hasTable($table): bool
    {
        $db = new Database();
        try {
            $db->query("SELECT 1 FROM `$table` LIMIT 1");
            $db->execute();
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public static function hasColumn($table, $column): bool
    {
        $db = new Database();
        try {
            $db->query("SHOW COLUMNS FROM `$table` LIKE :column");
            $db->bind(':column', $column);
            $res = $db->resultSet();
            return !empty($res);
        } catch (\Throwable $e) {
            return false;
        }
    }
}
