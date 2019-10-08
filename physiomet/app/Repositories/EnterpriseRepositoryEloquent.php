<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\EnterpriseRepository;
use AgenciaS3\Entities\Enterprise;
use AgenciaS3\Validators\EnterpriseValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class EnterpriseRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class EnterpriseRepositoryEloquent extends BaseRepository implements EnterpriseRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Enterprise::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EnterpriseValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
