<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProductImage.
 *
 * @package namespace AgenciaS3\Entities;
 */
class ProductImage extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'image',
        'label',
        'cover',
        'order'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
