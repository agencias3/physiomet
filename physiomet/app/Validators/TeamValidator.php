<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TeamValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TeamValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:191',
            'crefito' => 'max:191',
            'email' => 'max:191',
            'office' => 'max:191',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:191',
            'crefito' => 'max:191',
            'email' => 'max:191',
            'office' => 'max:191',
            'active' => 'required'
        ],
    ];
}
