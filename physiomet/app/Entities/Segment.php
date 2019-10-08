<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Segment.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Segment extends Model implements Transformable
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
        'resume',
        'description',
        'file',
        'active',
        'order',
        'seo_keywords',
        'seo_description',
        'seo_link'
    ];

    public function images()
    {
        return $this->hasMany(SegmentImage::class);
    }

    public function clients()
    {
        return $this->hasMany(SegmentClient::class);
    }

    public function products()
    {
        return $this->hasMany(SegmentProduct::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
