<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\FaqLikeOrNotRepository;
use AgenciaS3\Entities\FaqLikeOrNot;
use AgenciaS3\Validators\FaqLikeOrNotValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class FaqLikeOrNotRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class FaqLikeOrNotRepositoryEloquent extends BaseRepository implements FaqLikeOrNotRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FaqLikeOrNot::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FaqLikeOrNotValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
