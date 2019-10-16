<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TypeImageRepository;
use AgenciaS3\Entities\TypeImage;
use AgenciaS3\Validators\TypeImageValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class TypeImageRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TypeImageRepositoryEloquent extends BaseRepository implements TypeImageRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TypeImage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TypeImageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
