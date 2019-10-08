<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostImage.
 *
 * @package namespace AgenciaS3\Entities;
 */
class PostImage extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'image',
        'label',
        'order',
        'cover'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

}
