<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\PageItemRepository;
use AgenciaS3\Entities\PageItem;
use AgenciaS3\Validators\PageItemValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class PageItemRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PageItemRepositoryEloquent extends BaseRepository implements PageItemRepository, CacheableInterface
{
    use CacheableRepository;


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PageItem::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PageItemValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
