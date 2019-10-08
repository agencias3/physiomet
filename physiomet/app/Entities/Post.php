<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Post extends Model implements Transformable
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
        'name',
        'description',
        'date',
        'date_publish',
        'active',
        'seo_description',
        'seo_keywords',
        'seo_link'
    ];

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    public function postTags()
    {
        return $this->hasMany(PostTag::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }


}
