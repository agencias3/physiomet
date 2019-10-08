<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\SeoPageRepository;
use AgenciaS3\Entities\SeoPage;
use AgenciaS3\Validators\SeoPageValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SeoPageRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class SeoPageRepositoryEloquent extends BaseRepository implements SeoPageRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SeoPage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SeoPageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
