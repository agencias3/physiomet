<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\SegmentProductRepository;
use AgenciaS3\Entities\SegmentProduct;
use AgenciaS3\Validators\SegmentProductValidator;

/**
 * Class SegmentProductRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class SegmentProductRepositoryEloquent extends BaseRepository implements SegmentProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegmentProduct::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SegmentProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
