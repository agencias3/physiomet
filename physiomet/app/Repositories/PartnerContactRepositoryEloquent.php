<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\PartnerContactRepository;
use AgenciaS3\Entities\PartnerContact;
use AgenciaS3\Validators\PartnerContactValidator;

/**
 * Class PartnerContactRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PartnerContactRepositoryEloquent extends BaseRepository implements PartnerContactRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PartnerContact::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PartnerContactValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
