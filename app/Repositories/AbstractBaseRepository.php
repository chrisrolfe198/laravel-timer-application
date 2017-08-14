<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;

abstract class AbstractBaseRepository implements BaseRepositoryInterface
{
    protected $defaults = [
        'paginate_amount' => 10,
        'paginate' => false,
        'attribute_filters' => [],
        'relationships' => [],
        'relationship_filters' => [],
        'sort' => 'id',
        'sort_order' => 'desc'
    ];

    public function get_single($id)
    {
        return $this->model->findOrFail($id);
    }

    public function get_all($args = [])
    {
        $args = array_merge($this->defaults, $args);

        extract($args);

        $query = $this->model;

        foreach ($attribute_filters as $attribute => $filter) {
            if (is_array($filter)) {
                $query = $query->where($filter['key'], $filter['comparison'], $filter['value']);
            } else {
                $query = $query->where($attribute, '=', $filter);
            }
        }

        foreach ($relationship_filters as $relationship => $array) {
            foreach ($array as $inner_array) {
                foreach ($inner_array as $key => $value) {
                    $query = $query->whereHas($relationship, function($query) use ($key, $value) {
                        $query->where($key, '=', $value);
                    });
                }
            }
        }

        if (count($relationships)) {
            foreach ($relationships as $relation) {
                $query = $query->with($relation);
            }
        }

        $query = $query->orderBy($sort, $sort_order);

        if ($paginate) {
            return $query->paginate($paginate_amount);
        } else {
            return $query->get();
        }
    }

    public function create($args)
    {
        return $this->model->create($args);
    }

    public function update($id, $args)
    {
        $instance = $this->model->findOrFail($id);

        foreach ($args as $field => $arg) {
        $instance->{$field} = $arg;
        }

        $instance->save();

        return $instance;
    }

    public function delete($id)
    {
        if (in_array($id, $this->protected)) return false;

        $instance = $this->model->findOrFail($id);
        if ($instance->delete()) {
        return true;
        }
        return false;
    }
}
