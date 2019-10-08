<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByMinMaxDimensionCriteria implements CriteriaInterface
{

    private $min_dimension;

    private $max_dimension;

    public function __construct($min_dimension, $max_dimension)
    {
        $this->min_dimension = $min_dimension;
        $this->max_dimension = $max_dimension;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isPost($this->min_dimension) && isPost($this->max_dimension)) {
            return $model->where('dimension', '>=', $this->min_dimension)
                ->where('dimension', '<=', $this->max_dimension);
        }

        return $model;
    }
}