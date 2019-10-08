<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Page.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Page extends Model implements Transformable
{
    use TransformableTrait;

    //protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sub_name',
        'description',
        'image',
        'banner',
        'video',
        'video_mp4',
        'video_ogg',
        'order'
    ];

    public function images()
    {
        return $this->hasMany(PageImage::class);
    }

    public function items()
    {
        return $this->hasMany(PageItem::class);
    }

}
