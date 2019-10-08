<?php

namespace AgenciaS3\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByAddressCriteria implements CriteriaInterface
{

    private $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (isset($this->address)) {
            if (isPost($this->address)) {
                return $model->whereHas('enterprise', function ($query) {
                    $query->where('street', 'LIKE', "%{$this->address}%")
                        ->orWhere('district', 'LIKE', "%{$this->address}%")
                        ->orWhere('city', 'LIKE', "%{$this->address}%")
                        ->orWhere('state', 'LIKE', "%{$this->address}%")
                        ->orWhere('name', 'LIKE', "%{$this->address}%");
                });
            }
        }

        return $model;
    }
}