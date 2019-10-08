<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PartnerClient.
 *
 * @package namespace AgenciaS3\Entities;
 */
class PartnerClient extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partner_id',
        'social_reason',
        'cnpj',
        'phone',
        'state',
        'city'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

}
