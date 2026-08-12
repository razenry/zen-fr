<?php

namespace App\Core;

use Database\Database;

class Validator
{
    protected $data;
    protected $rules;
    protected $errors = [];

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public static function make(array $data, array $rules): self
    {
        $validator = new static($data, $rules);
        $validator->validate();
        return $validator;
    }

    public function validate(): bool
    {
        $this->errors = [];

        foreach ($this->rules as $field => $ruleString) {
            $value = $this->data[$field] ?? null;
            $rules = is_array($ruleString) ? $ruleString : explode('|', $ruleString);

            foreach ($rules as $rule) {
                $ruleName = $rule;
                $ruleParam = null;

                if (strpos($rule, ':') !== false) {
                    list($ruleName, $ruleParam) = explode(':', $rule, 2);
                }

                switch ($ruleName) {
                    case 'required':
                        if ($value === null || $value === '') {
                            $this->addError($field, "Field '{$field}' is required.");
                        }
                        break;

                    case 'email':
                        if ($value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->addError($field, "Field '{$field}' must be a valid email address.");
                        }
                        break;

                    case 'numeric':
                        if ($value && !is_numeric($value)) {
                            $this->addError($field, "Field '{$field}' must be numeric.");
                        }
                        break;

                    case 'string':
                        if ($value && !is_string($value)) {
                            $this->addError($field, "Field '{$field}' must be a string.");
                        }
                        break;

                    case 'min':
                        if ($value !== null && strlen((string)$value) < (int)$ruleParam) {
                            $this->addError($field, "Field '{$field}' must be at least {$ruleParam} characters.");
                        }
                        break;

                    case 'max':
                        if ($value !== null && strlen((string)$value) > (int)$ruleParam) {
                            $this->addError($field, "Field '{$field}' may not be greater than {$ruleParam} characters.");
                        }
                        break;

                    case 'unique':
                        if ($value && $ruleParam) {
                            list($table, $column) = explode(',', $ruleParam);
                            $db = new Database();
                            $exists = $db->table($table)->where($column, '=', $value)->first();
                            if ($exists) {
                                $this->addError($field, "Field '{$field}' has already been taken.");
                            }
                        }
                        break;
                }
            }
        }

        return empty($this->errors);
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    protected function addError(string $field, string $message)
    {
        if (!isset($this->errors[$field])) {
            $this->errors[$field] = [];
        }
        $this->errors[$field][] = $message;
    }
}
