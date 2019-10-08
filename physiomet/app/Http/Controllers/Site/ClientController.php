<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\ClientRepository;

class ClientController extends Controller
{

    protected $repository;


    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getClients()
    {
        $this->repository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->repository->orderBy('order', 'asc')->findByField('active', 'y');
    }

    public function show($id)
    {
        $this->repository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->repository->find($id);
    }

}
