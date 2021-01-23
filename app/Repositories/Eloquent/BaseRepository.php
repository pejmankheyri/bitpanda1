<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\ModelNotDefined;
use App\Repositories\Contracts\IBase;
use App\Repositories\Criteria\ICriteria;
use Illuminate\Support\Arr;

abstract class BaseRepository implements IBase,ICriteria
{
    protected $model;

    /**
     * @constructor for getting model class.
     */
    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    /**
     * method for get all data.
     * 
     * @return model object
     */
    public function all()
    {
        return $this->model->get();
    }

    /**
     * method for find specific model by id.
     * 
     * @param  int  $id
     * 
     * @return model object
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * method for find data where specific model column has value.
     * 
     * @param  string  $column
     * @param  string  $value
     * 
     * @return model object
     */
    public function findWhere($column, $value)
    {
        return $this->model->where($column, $value)->get();
        
    }

    /**
     * method for find data where specific model column has value.
     * 
     * @param  string  $column
     * @param  string  $value
     * 
     * @return model object
     */
    public function findWhereFirst($column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    /**
     * method for get data by pagination.
     * 
     * @param  int  $perpage
     * 
     * @return model object
     */
    public function paginate($perpage = 10)
    {
        return $this->model->paginate($perpage);
    }

    /**
     * method for create model with data.
     * 
     * @param  array  $data
     * 
     * @return created model object
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * method for update specific model with data.
     * 
     * @param  int  $id
     * @param  array  $data
     * 
     * @return updated model object
     */
    public function update($id, array $data)
    {
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }

    /**
     * method for delete specific model.
     * 
     * @param  int  $id
     * 
     * @return boolean
     */
    public function delete($id)
    {
        $record = $this->find($id);
        return $record->delete();
    }

    /**
     * method for adding criteria into model.
     * 
     * @param  array  $criteria
     * 
     * @return criteria
     */
    public function withCriteria(...$criteria)
    {
        $citeria = Arr::flatten($criteria);
        foreach ($citeria as $citerion) {
            $this->model = $citerion->apply($this->model);
        }

        return $this;
    }

    /**
     * method for getting model class.
     * 
     * @return model class
     */
    protected function getModelClass()
    {
        if (!method_exists($this, 'model')) {
            throw new ModelNotDefined();
        }

        return app()->make($this->model());
    }
}
