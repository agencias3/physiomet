<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\PartnerProviderRepository;
use AgenciaS3\Entities\PartnerProvider;
use AgenciaS3\Validators\PartnerProviderValidator;

/**
 * Class PartnerProviderRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PartnerProviderRepositoryEloquent extends BaseRepository implements PartnerProviderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PartnerProvider::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PartnerProviderValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
