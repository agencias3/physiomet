<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TagValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TagValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:255',
            'active' => 'required',
            'seo_link' => 'required|min:3|max:255'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3|max:255',
            'active' => 'required',
            'seo_link' => 'required|min:3|max:255'
        ],
    ];
}
