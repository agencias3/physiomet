<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class EnterpriseImageValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class EnterpriseImageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'enterprise_id' => 'required|exists:enterprises,id',
            'image' => 'required',
            'cover' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
