<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CovenantValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class CovenantValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:191',
            'link_url' => 'max:191',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:191',
            'link_url' => 'max:191',
            'active' => 'required'
        ],
    ];
}
