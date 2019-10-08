<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Tip.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Tip extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'active',
        'order'
    ];

    public function items()
    {
        return $this->hasMany(TipItem::class);
    }

}
