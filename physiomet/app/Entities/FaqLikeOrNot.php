<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class FaqLikeOrNot.
 *
 * @package namespace AgenciaS3\Entities;
 */
class FaqLikeOrNot extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'faq_id',
        'like'
    ];

    public function faq()
    {
        return $this->hasMany(Faq::class, 'faq_id');
    }

}
