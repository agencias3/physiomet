<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class WorkValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class WorkValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:255',
            'phone' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'view' => 'required',
            'session_id' => 'required',
            'ip' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
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
