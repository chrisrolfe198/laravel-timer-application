<?php

namespace App\Contracts;

interface BaseRepositoryInterface
{
    public function get_single($id);
    public function get_all($args = []);
    public function create($args);
    public function update($id, $args);
    public function delete($id);
}
