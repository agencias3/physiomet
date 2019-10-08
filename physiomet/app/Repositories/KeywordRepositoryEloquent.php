<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\KeywordRepository;
use AgenciaS3\Entities\Keyword;
use AgenciaS3\Validators\KeywordValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class KeywordRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class KeywordRepositoryEloquent extends BaseRepository implements KeywordRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Keyword::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return KeywordValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
