<?php

namespace AgenciaS3\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AgenciaS3\Repositories\TypeRepository;
use AgenciaS3\Entities\Type;
use AgenciaS3\Validators\TypeValidator;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class TypeRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class TypeRepositoryEloquent extends BaseRepository implements TypeRepository, CacheableInterface
{

    use CacheableRepository;

    public function getActive($limit)
    {
        return $this->with('images')
            ->scopeQuery(function ($query) {
                $query = $query->where('active', '=', 'y');
                return $query;
            })->paginate($limit);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Type::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
