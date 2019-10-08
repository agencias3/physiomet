<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByMinMaxPriceCriteria implements CriteriaInterface
{

    private $min_price;

    private $max_price;

    public function __construct($min_price, $max_price)
    {
        $this->min_price = $min_price;
        $this->max_price = $max_price;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if(isPost($this->min_price) && isPost($this->max_price)) {
            return $model->where('price', '>=', trataCampoValor($this->min_price))
                ->where('price', '<=', trataCampoValor($this->max_price));
        }

        return $model;
    }
}