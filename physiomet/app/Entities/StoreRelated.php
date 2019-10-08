<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StoreRelated.
 *
 * @package namespace AgenciaS3\Entities;
 */
class StoreRelated extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'store_related_id'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function related()
    {
        return $this->belongsTo(Store::class, 'store_related_id');
    }

}
