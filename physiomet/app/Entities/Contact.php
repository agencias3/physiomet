<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Contact.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Contact extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'name',
        'email',
        'phone',
        'cell_phone',
        'subject',
        'message',
        'view',
        'session_id',
        'ip'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
