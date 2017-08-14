<?php

namespace App\Repositories;

use App\Contracts\GroupRepositoryInterface;
use App\Group;

class GroupRepository extends AbstractBaseRepository implements GroupRepositoryInterface
{
    public function __construct()
    {
        $this->model = new Group;
    }
}
