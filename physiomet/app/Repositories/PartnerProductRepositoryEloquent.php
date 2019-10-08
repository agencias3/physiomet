<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\PartnerProductRepository;
use AgenciaS3\Entities\PartnerProduct;
use AgenciaS3\Validators\PartnerProductValidator;

/**
 * Class PartnerProductRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PartnerProductRepositoryEloquent extends BaseRepository implements PartnerProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PartnerProduct::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PartnerProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
