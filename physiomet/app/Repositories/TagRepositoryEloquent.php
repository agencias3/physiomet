<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\Tag;
use AgenciaS3\Validators\TagValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class TagRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TagRepositoryEloquent extends BaseRepository implements TagRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tag::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return TagValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
