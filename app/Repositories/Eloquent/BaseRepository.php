<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\ModelNotDefined;
use App\Repositories\Contracts\IBase;
use App\Repositories\Criteria\ICriteria;
use Illuminate\Support\Arr;

abstract class BaseRepository implements IBase,ICriteria
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    public function all()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findWhere($column, $value)
    {
        return $this->model->where($column, $value)->get();
        
    }

    public function findWhereFirst($column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    public function paginate($perpage = 10)
    {
        return $this->model->paginate($perpage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        return $record->delete();
    }

    public function withCriteria(...$criteria)
    {
        $citeria = Arr::flatten($criteria);
        foreach ($citeria as $citerion) {
            $this->model = $citerion->apply($this->model);
        }

        return $this;
    }


    protected function getModelClass()
    {
        if (!method_exists($this, 'model')) {
            throw new ModelNotDefined();
        }

        return app()->make($this->model());
    }
}
