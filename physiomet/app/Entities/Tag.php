<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Tag.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Tag extends Model implements Transformable
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
        'active',
        'seo_description',
        'seo_keywords',
        'seo_link'
    ];

    public function postTags()
    {
        return $this->hasMany(PostTag::class);
    }

}
