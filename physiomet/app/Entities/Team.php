<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Team.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Team extends Model implements Transformable
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
        'crefito',
        'email',
        'office',
        'description',
        'complement',
        'image',
        'order',
        'active'
    ];

}
