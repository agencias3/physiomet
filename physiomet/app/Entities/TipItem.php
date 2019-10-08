<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TipItem.
 *
 * @package namespace AgenciaS3\Entities;
 */
class TipItem extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tip_id',
        'name',
        'progress',
        'active',
        'order'
    ];

    public function tip()
    {
        return $this->belongsTo(Tip::class, 'tip_id');
    }

}
