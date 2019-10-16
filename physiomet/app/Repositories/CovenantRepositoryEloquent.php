<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\CovenantRepository;
use AgenciaS3\Entities\Covenant;
use AgenciaS3\Validators\CovenantValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CovenantRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class CovenantRepositoryEloquent extends BaseRepository implements CovenantRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Covenant::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CovenantValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
