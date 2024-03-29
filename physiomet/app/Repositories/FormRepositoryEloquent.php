<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\FormRepository;
use AgenciaS3\Entities\Form;
use AgenciaS3\Validators\FormValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class FormRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class FormRepositoryEloquent extends BaseRepository implements FormRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Form::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FormValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
