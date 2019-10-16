<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ContactValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ContactValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'service_id' => 'required|exists:services,id',
            'name' => 'required|min:3|max:191',
            'phone' => 'required|min:3|max:191',
            'email' => 'required|email',
            'message' => 'required',
            'view' => 'required',
            'session_id' => 'required',
            'ip' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'service_id' => 'required|exists:services,id',
            'name' => 'required|min:3|max:255',
            'phone' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'view' => 'required',
            'session_id' => 'required',
            'ip' => 'required'
        ],
    ];
}
