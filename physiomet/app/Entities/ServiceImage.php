<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ServiceImage.
 *
 * @package namespace AgenciaS3\Entities;
 */
class ServiceImage extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'image',
        'label',
        'order',
        'cover'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
