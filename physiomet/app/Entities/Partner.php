<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Partner.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Partner extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'social_reason',
        'fantasy_name',
        'cnpj',
        'state_registration',
        'address',
        'neighborhood',
        'city',
        'state',
        'zip_code',
        'phone',
        'fax',
        'email',
        'amount_employees',
        'acting_region',
        'how_did_it_arrive',
        'view',
        'session_id',
        'ip'
    ];

    public function contacts()
    {
        return $this->hasMany(PartnerContact::class);
    }

    public function products()
    {
        return $this->hasMany(PartnerProduct::class);
    }

    public function clients()
    {
        return $this->hasMany(PartnerClient::class);
    }

    public function providers()
    {
        return $this->hasMany(PartnerProvider::class);
    }

}
