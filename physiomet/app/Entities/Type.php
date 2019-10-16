<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Type.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Type extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'description',
        'order',
        'active',
        'seo_description',
        'seo_keywords',
        'seo_link',
    ];

    public function images()
    {
        return $this->hasMany(TypeImage::class);
    }

}
