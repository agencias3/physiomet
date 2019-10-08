<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ProductFileRepository;
use AgenciaS3\Entities\ProductFile;
use AgenciaS3\Validators\ProductFileValidator;

/**
 * Class ProductFileRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ProductFileRepositoryEloquent extends BaseRepository implements ProductFileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductFile::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductFileValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
