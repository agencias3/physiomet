<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\CovenantRepository;

class CovenantController extends Controller
{

    protected $repository;

    public function __construct(CovenantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getActives()
    {
        $this->repository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->repository->orderBy('order', 'asc')->findByField('active', 'y');
    }

}
