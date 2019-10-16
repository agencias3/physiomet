<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TypeValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TypeValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:191',
            'order' => 'max:10',
            'active' => 'required',
            'seo_description' => 'max:255',
            'seo_keywords' => 'max:255',
            'seo_link' => 'required|max:191'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:191',
            'order' => 'max:10',
            'active' => 'required',
            'seo_description' => 'max:255',
            'seo_keywords' => 'max:255',
            'seo_link' => 'required|max:191'
        ],
    ];
}
