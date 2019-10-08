<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class StoreValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class StoreValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'enterprise_id' => 'required|exists:enterprises,id',
            'name' => 'required|min:3|max:191',
            'active' => 'required',
            'tag' => 'required',
            'seo_link' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'enterprise_id' => 'required|exists:enterprises,id',
            'name' => 'required|min:3|max:191',
            'active' => 'required',
            'tag' => 'required',
            'seo_link' => 'required'
        ],
    ];
}
