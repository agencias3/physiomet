<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\PartnerClientRepository;
use AgenciaS3\Entities\PartnerClient;
use AgenciaS3\Validators\PartnerClientValidator;

/**
 * Class PartnerClientRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PartnerClientRepositoryEloquent extends BaseRepository implements PartnerClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PartnerClient::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PartnerClientValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
