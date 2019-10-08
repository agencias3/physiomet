<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\FaqRepository;
use AgenciaS3\Entities\Faq;
use AgenciaS3\Validators\FaqValidator;

/**
 * Class FaqRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class FaqRepositoryEloquent extends BaseRepository implements FaqRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Faq::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FaqValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
