<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TeamRepository;
use AgenciaS3\Entities\Team;
use AgenciaS3\Validators\TeamValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class TeamRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TeamRepositoryEloquent extends BaseRepository implements TeamRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Team::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TeamValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
