<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\TipItemRepository;
use AgenciaS3\Repositories\TipRepository;

class TipController extends Controller
{

    protected $repository;

    protected $tipItemRepository;

    protected $pageItemRepository;

    public function __construct(TipRepository $repository,
                                TipItemRepository $tipItemRepository)
    {
        $this->repository = $repository;
        $this->tipItemRepository = $tipItemRepository;
    }

    public function getActives()
    {
        $this->repository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->repository->orderBy('order', 'asc')->findByField('active', 'y');
    }

    public function items($id)
    {
        $this->tipItemRepository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->tipItemRepository->orderBy('order', 'asc')->findWhere(['tip_id' => $id, 'active' => 'y']);
    }

}
