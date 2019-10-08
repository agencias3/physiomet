<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SegmentImage.
 *
 * @package namespace AgenciaS3\Entities;
 */
class SegmentImage extends Model implements Transformable
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
        'image',
        'label',
        'order',
        'cover'
    ];

    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }

}
