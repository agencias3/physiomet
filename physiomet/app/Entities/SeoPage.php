<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Banner.
 *
 * @package namespace AgenciaS3\Entities;
 */
class SeoPage extends Model implements Transformable
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
        'seo_keywords',
        'seo_description',
        'script',
        'script_body'
    ];

}
