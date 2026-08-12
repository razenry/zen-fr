<?php

namespace Database;

use PDO;
use PDOException;

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            
            if (!empty($this->db_name)) {
                $this->dbh->exec("CREATE DATABASE IF NOT EXISTS `" . $this->db_name . "`");
                $this->dbh->exec("USE `" . $this->db_name . "`");
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }


    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    // --- Query Builder Methods ---

    private $qb_table = '';
    private $qb_select = '*';
    private $qb_where = [];
    private $qb_params = [];
    private $qb_order = '';
    private $qb_limit = '';

    public function table($table)
    {
        $this->qb_table = $table;
        // Reset query builder variables for new query
        $this->qb_select = '*';
        $this->qb_where = [];
        $this->qb_params = [];
        $this->qb_order = '';
        $this->qb_limit = '';
        return $this;
    }

    public function select($columns = '*')
    {
        $this->qb_select = is_array($columns) ? implode(', ', $columns) : $columns;
        return $this;
    }

    public function where($column, $operator, $value = null)
    {
        if ($value === null) {
            $value = $operator;
            $operator = '=';
        }
        
        $this->qb_where[] = "$column $operator ?";
        $this->qb_params[] = $value;
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        $this->qb_order = " ORDER BY $column $direction";
        return $this;
    }

    public function limit($limit, $offset = 0)
    {
        $this->qb_limit = " LIMIT $offset, $limit";
        return $this;
    }

    public function get()
    {
        $sql = "SELECT {$this->qb_select} FROM {$this->qb_table}";
        if (!empty($this->qb_where)) {
            $sql .= " WHERE " . implode(' AND ', $this->qb_where);
        }
        $sql .= $this->qb_order . $this->qb_limit;

        $this->query($sql);
        foreach ($this->qb_params as $index => $value) {
            $this->bind($index + 1, $value);
        }
        return $this->resultSet();
    }

    public function first()
    {
        $this->limit(1);
        $result = $this->get();
        return !empty($result) ? $result[0] : null;
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $placeholders = implode(', ', array_fill(0, count($keys), '?'));
        
        $sql = "INSERT INTO {$this->qb_table} ($fields) VALUES ($placeholders)";
        $this->query($sql);
        
        $i = 1;
        foreach ($data as $value) {
            $this->bind($i++, $value);
        }
        
        return $this->execute();
    }

    public function update($data)
    {
        $setFields = [];
        foreach (array_keys($data) as $key) {
            $setFields[] = "$key = ?";
        }
        $setClause = implode(', ', $setFields);
        
        $sql = "UPDATE {$this->qb_table} SET $setClause";
        if (!empty($this->qb_where)) {
            $sql .= " WHERE " . implode(' AND ', $this->qb_where);
        }
        
        $this->query($sql);
        
        $i = 1;
        foreach ($data as $value) {
            $this->bind($i++, $value);
        }
        foreach ($this->qb_params as $value) {
            $this->bind($i++, $value);
        }
        
        return $this->execute();
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->qb_table}";
        if (!empty($this->qb_where)) {
            $sql .= " WHERE " . implode(' AND ', $this->qb_where);
        }
        
        $this->query($sql);
        
        $i = 1;
        foreach ($this->qb_params as $value) {
            $this->bind($i++, $value);
        }
        
        return $this->execute();
    }

    public function count(): int
    {
        $sql = "SELECT COUNT(*) as aggregate FROM {$this->qb_table}";
        if (!empty($this->qb_where)) {
            $sql .= " WHERE " . implode(' AND ', $this->qb_where);
        }
        $this->query($sql);
        foreach ($this->qb_params as $index => $value) {
            $this->bind($index + 1, $value);
        }
        $res = $this->single();
        return (int)($res['aggregate'] ?? 0);
    }

    public function paginate($perPage = 15, $pageName = 'page', $page = null)
    {
        $page = $page ?: (int)($_GET[$pageName] ?? 1);
        $page = max(1, $page);

        $total = $this->count();
        $offset = ($page - 1) * $perPage;
        $this->limit($perPage, $offset);

        $items = $this->get();

        return new Paginator($items, $total, $perPage, $page, $pageName);
    }
}

class Paginator implements \ArrayAccess, \IteratorAggregate, \Countable
{
    public $items;
    public $total;
    public $perPage;
    public $currentPage;
    public $lastPage;
    public $pageName;

    public function __construct($items, $total, $perPage = 15, $currentPage = 1, $pageName = 'page')
    {
        $this->items = $items;
        $this->total = (int)$total;
        $this->perPage = (int)$perPage;
        $this->currentPage = (int)$currentPage;
        $this->lastPage = (int)max(1, ceil($total / $perPage));
        $this->pageName = $pageName;
    }

    public function links(): string
    {
        if ($this->lastPage <= 1) {
            return '';
        }

        $html = '<nav aria-label="Page navigation"><ul class="pagination mb-0">';
        
        if ($this->currentPage <= 1) {
            $html .= '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
        } else {
            $html .= '<li class="page-item"><a class="page-link" href="' . $this->url($this->currentPage - 1) . '">&laquo;</a></li>';
        }

        for ($i = 1; $i <= $this->lastPage; $i++) {
            if ($i === $this->currentPage) {
                $html .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="' . $this->url($i) . '">' . $i . '</a></li>';
            }
        }

        if ($this->currentPage >= $this->lastPage) {
            $html .= '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
        } else {
            $html .= '<li class="page-item"><a class="page-link" href="' . $this->url($this->currentPage + 1) . '">&raquo;</a></li>';
        }

        $html .= '</ul></nav>';
        return $html;
    }

    public function url($page): string
    {
        $params = $_GET;
        $params[$this->pageName] = $page;
        $baseUrl = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        return $baseUrl . '?' . http_build_query($params);
    }

    public function getIterator(): \Traversable { return new \ArrayIterator($this->items); }
    public function count(): int { return count($this->items); }
    public function offsetExists($offset): bool { return isset($this->items[$offset]); }
    #[\ReturnTypeWillChange]
    public function offsetGet($offset) { return $this->items[$offset] ?? null; }
    public function offsetSet($offset, $value): void { $this->items[$offset] = $value; }
    public function offsetUnset($offset): void { unset($this->items[$offset]); }
    public function toArray(): array {
        return [
            'data' => $this->items,
            'total' => $this->total,
            'per_page' => $this->perPage,
            'current_page' => $this->currentPage,
            'last_page' => $this->lastPage
        ];
    }
}

