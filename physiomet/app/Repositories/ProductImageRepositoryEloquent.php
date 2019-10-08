<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ProductImageRepository;
use AgenciaS3\Entities\ProductImage;
use AgenciaS3\Validators\ProductImageValidator;

/**
 * Class ProductImageRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ProductImageRepositoryEloquent extends BaseRepository implements ProductImageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductImage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductImageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
