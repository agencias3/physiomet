<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Store.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Store extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enterprise_id',
        'name',
        'price',
        'price_iptu',
        'price_condominium',
        'dimension',
        'file',
        'description',
        'order',
        'active',
        'tag',
        'seo_description',
        'seo_keywords',
        'seo_link'
    ];

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'enterprise_id');
    }

    public function images()
    {
        return $this->hasMany(StoreImage::class);
    }

    public function relateds()
    {
        return $this->hasMany(StoreRelated::class);
    }

    public function segments()
    {
        return $this->hasMany(StoreSegment::class);
    }

}
