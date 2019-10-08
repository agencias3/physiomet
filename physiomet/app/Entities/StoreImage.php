<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StoreImage.
 *
 * @package namespace AgenciaS3\Entities;
 */
class StoreImage extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'image',
        'label',
        'order',
        'cover'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

}
