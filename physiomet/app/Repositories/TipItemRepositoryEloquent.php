<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TipItemRepository;
use AgenciaS3\Entities\TipItem;
use AgenciaS3\Validators\TipItemValidator;

/**
 * Class TipItemRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TipItemRepositoryEloquent extends BaseRepository implements TipItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipItem::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TipItemValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
