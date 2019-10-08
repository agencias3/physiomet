<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StoreSegment.
 *
 * @package namespace AgenciaS3\Entities;
 */
class StoreSegment extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'segment_id'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }

}
