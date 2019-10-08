<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\EnterpriseImageRepository;
use AgenciaS3\Entities\EnterpriseImage;
use AgenciaS3\Validators\EnterpriseImageValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class EnterpriseImageRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class EnterpriseImageRepositoryEloquent extends BaseRepository implements EnterpriseImageRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EnterpriseImage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EnterpriseImageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
