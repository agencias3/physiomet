<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ProductClientRepository;
use AgenciaS3\Entities\ProductClient;
use AgenciaS3\Validators\ProductClientValidator;

/**
 * Class ProductClientRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ProductClientRepositoryEloquent extends BaseRepository implements ProductClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductClient::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductClientValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
