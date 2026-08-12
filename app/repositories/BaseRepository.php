<?php

namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    abstract protected function getModelClass(): string;

    public function all()
    {
        $modelClass = $this->model;
        return $modelClass::all();
    }

    public function find($id)
    {
        $modelClass = $this->model;
        return $modelClass::find($id);
    }

    public function create(array $data)
    {
        $modelClass = $this->model;
        return $modelClass::create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        if ($record) {
            $record->update($data);
            return $this->find($id);
        }
        return false;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        if ($record) {
            return $record->delete();
        }
        return false;
    }

    public function where($column, $operator, $value = null)
    {
        $modelClass = $this->model;
        return $modelClass::where($column, $operator, $value)->get();
    }
}
