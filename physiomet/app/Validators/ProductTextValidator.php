<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProductTextValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ProductTextValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
    ];
}
