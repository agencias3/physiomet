<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SegmentClient.
 *
 * @package namespace AgenciaS3\Entities;
 */
class SegmentClient extends Model implements Transformable
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
        'client_id'
    ];

    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
