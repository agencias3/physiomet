<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SeoPageValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class SeoPageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:255'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3|max:255'
        ],
    ];
}
