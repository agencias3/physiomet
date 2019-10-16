<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TypeImage.
 *
 * @package namespace AgenciaS3\Entities;
 */
class TypeImage extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'image',
        'label',
        'order',
        'cover'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

}
