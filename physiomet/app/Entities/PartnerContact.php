<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PartnerContact.
 *
 * @package namespace AgenciaS3\Entities;
 */
class PartnerContact extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deletedt_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partner_id',
        'name',
        'office',
        'phone'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

}
