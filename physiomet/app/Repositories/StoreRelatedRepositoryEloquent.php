<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\StoreRelatedRepository;
use AgenciaS3\Entities\StoreRelated;
use AgenciaS3\Validators\StoreRelatedValidator;

/**
 * Class StoreRelatedRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class StoreRelatedRepositoryEloquent extends BaseRepository implements StoreRelatedRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StoreRelated::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StoreRelatedValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
