<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class StoreImageValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class StoreImageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'store_id' => 'required|exists:stores,id',
            'image' => 'required',
            'cover' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
