<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class KeywordValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class KeywordValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:255',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3|max:255',
            'active' => 'required'
        ],
    ];
}
