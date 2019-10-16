<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ServiceValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ServiceValidator extends LaravelValidator
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
