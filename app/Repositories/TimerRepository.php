<?php

namespace App\Repositories;

use App\Contracts\TimerRepositoryInterface;
use App\Timer;

class TimerRepository extends AbstractBaseRepository implements TimerRepositoryInterface
{
    public function __construct()
    {
        $this->model = new Timer;
    }
}
