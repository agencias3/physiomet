<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\ServiceImageRepository;
use AgenciaS3\Entities\ServiceImage;
use AgenciaS3\Validators\ServiceImageValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class ServiceImageRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class ServiceImageRepositoryEloquent extends BaseRepository implements ServiceImageRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceImage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return ServiceImageValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
