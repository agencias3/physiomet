<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByEnterpriseCriteria implements CriteriaInterface
{

    private $enterprise_id;

    public function __construct($enterprise_id)
    {
        $this->enterprise_id = $enterprise_id;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->enterprise_id)) {
            return $model->where('enterprise_id', $this->enterprise_id);
        }

        return $model;
    }
}