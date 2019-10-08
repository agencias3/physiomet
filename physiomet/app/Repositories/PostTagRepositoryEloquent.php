<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\PostTag;
use AgenciaS3\Validators\PostTagValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class PostTagRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PostTagRepositoryEloquent extends BaseRepository implements PostTagRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostTag::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return PostTagValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
