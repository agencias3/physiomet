<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SegmentProduct.
 *
 * @package namespace AgenciaS3\Entities;
 */
class SegmentProduct extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'segment_id',
        'product_id'
    ];

    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
