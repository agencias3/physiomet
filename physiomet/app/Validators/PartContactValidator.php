<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PartContactValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PartContactValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:191',
            'contact_name' => 'required|min:3|max:191',
            'email' => 'required|email|max:191',
            'cnpj' => 'required|min:3|max:191',
            'state_registration' => 'required',
            'address' => 'required|min:3|max:191',
            'phone' => 'required|min:3|max:191',
            'view' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3|max:191',
            'contact_name' => 'required|min:3|max:191',
            'email' => 'required|email|max:191',
            'cnpj' => 'required|min:3|max:191',
            'state_registration' => 'required',
            'address' => 'required|min:3|max:191',
            'phone' => 'required|min:3|max:191',
            'view' => 'required'
        ],
    ];
}
