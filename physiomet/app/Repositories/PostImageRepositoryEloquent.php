<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\PostImage;
use AgenciaS3\Validators\PostImageValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class PostImageRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PostImageRepositoryEloquent extends BaseRepository implements PostImageRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostImage::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return PostImageValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
