<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\PartnerRepository;
use AgenciaS3\Entities\Partner;
use AgenciaS3\Validators\PartnerValidator;

/**
 * Class PartnerRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PartnerRepositoryEloquent extends BaseRepository implements PartnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Partner::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PartnerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
