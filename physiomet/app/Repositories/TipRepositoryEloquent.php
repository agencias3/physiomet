<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TipRepository;
use AgenciaS3\Entities\Tip;
use AgenciaS3\Validators\TipValidator;

/**
 * Class TipRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TipRepositoryEloquent extends BaseRepository implements TipRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tip::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TipValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
