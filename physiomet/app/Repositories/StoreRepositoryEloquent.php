<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\Store;
use AgenciaS3\Validators\StoreValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class StoreRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class StoreRepositoryEloquent extends BaseRepository implements StoreRepository
{

    protected $fieldSearchable = [
        'name' => 'like',
        'enterprise.name' => 'like',
        'description' => 'like'
    ];

    public function getRelateds($store, $limit)
    {
        return $this->with(['images', 'enterprise'])
            ->scopeQuery(function ($query) use ($store) {
                $query = $query->leftjoin('store_relateds as sr', 'sr.store_related_id', '=', 'stores.id')
                    ->select('stores.*')
                    ->where('sr.store_id', '=', $store->id)
                    ->where('active', '=', 'y')
                    ->orderBy('order', 'asc');
                return $query;
            })->all();
    }

    public function getSegments($id)
    {
        return $this->with(['images', 'enterprise'])
            ->scopeQuery(function ($query) use ($id) {
                $query = $query->leftjoin('store_segments as ss', 'ss.store_id', '=', 'stores.id')
                    ->select('stores.*')
                    ->where('ss.segment_id', '=', $id)
                    ->where('active', '=', 'y')
                    ->orderBy('order', 'asc');
                return $query;
            })->all();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Store::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return StoreValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
