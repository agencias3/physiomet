<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\StoreImageRepository;
use AgenciaS3\Entities\StoreImage;
use AgenciaS3\Validators\StoreImageValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class StoreImageRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class StoreImageRepositoryEloquent extends BaseRepository implements StoreImageRepository, CacheableInterface
{
    use CacheableRepository;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StoreImage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StoreImageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
