<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\StoreSegmentRepository;
use AgenciaS3\Entities\StoreSegment;
use AgenciaS3\Validators\StoreSegmentValidator;

/**
 * Class StoreSegmentRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class StoreSegmentRepositoryEloquent extends BaseRepository implements StoreSegmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StoreSegment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StoreSegmentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
