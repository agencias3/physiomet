<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'resume',
        'icon',
        'description',
        'video',
        'order',
        'active',
        'seo_description',
        'seo_keywords',
        'seo_link'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function files()
    {
        return $this->hasMany(ProductFile::class);
    }

    public function texts()
    {
        return $this->hasMany(ProductText::class);
    }

    public function segments()
    {
        return $this->hasMany(SegmentProduct::class);
    }

    public function clients()
    {
        return $this->hasMany(ProductClient::class);
    }

}
