<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProductClientValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ProductClientValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'product_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'product_id' => 'required|exists:products,id',
            'client_id' => 'required|exists:clients,id'
        ],
    ];
}
