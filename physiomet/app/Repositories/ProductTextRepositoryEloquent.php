<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ProductTextRepository;
use AgenciaS3\Entities\ProductText;
use AgenciaS3\Validators\ProductTextValidator;

/**
 * Class ProductTextRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ProductTextRepositoryEloquent extends BaseRepository implements ProductTextRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductText::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductTextValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
