<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Client.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Client extends Model implements Transformable
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
        'link_url',
        'image',
        'order',
        'active'
    ];

    public function segments()
    {
        return $this->hasMany(SegmentClient::class);
    }

    public function products()
    {
        return $this->hasMany(ProductClient::class);
    }

}
