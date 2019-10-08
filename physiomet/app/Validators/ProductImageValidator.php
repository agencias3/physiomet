<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProductImageValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ProductImageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'product_id' => 'required|exists:products,id',
            'image' => 'required',
            'cover' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
        ],
    ];
}
