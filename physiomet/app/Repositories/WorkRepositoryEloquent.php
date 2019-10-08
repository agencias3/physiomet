<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\WorkRepository;
use AgenciaS3\Entities\Work;
use AgenciaS3\Validators\WorkValidator;

/**
 * Class WorkRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class WorkRepositoryEloquent extends BaseRepository implements WorkRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Work::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WorkValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
