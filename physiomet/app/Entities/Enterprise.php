<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Enterprise.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Enterprise extends Model implements Transformable
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
        'zip_code',
        'street',
        'district',
        'number',
        'state',
        'city',
        'complement',
        'description',
        'order',
        'image',
        'active',
        'tag',
        'seo_description',
        'seo_keywords',
        'seo_link'
    ];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function images()
    {
        return $this->hasMany(EnterpriseImage::class);
    }

}
