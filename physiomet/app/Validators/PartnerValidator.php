<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PartnerValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PartnerValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'social_reason' => 'required|max:191',
            'cnpj' => 'required|max:191',
            'state_registration' => 'required|max:191',
            'address' => 'required|max:191',
            'neighborhood' => 'required|max:191',
            'city' => 'required|max:191',
            'state' => 'required|max:191',
            'zip_code' => 'required|max:191',
            'phone' => 'required|max:191',
            'email' => 'required|email|max:191',
            'view' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'social_reason' => 'required|max:191',
            'cnpj' => 'required|max:191',
            'state_registration' => 'required|max:191',
            'address' => 'required|max:191',
            'neighborhood' => 'required|max:191',
            'city' => 'required|max:191',
            'state' => 'required|max:191',
            'zip_code' => 'required|max:191',
            'phone' => 'required|max:191',
            'email' => 'required|email|max:191',
            'view' => 'required'
        ],
    ];
}
