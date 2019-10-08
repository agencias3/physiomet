<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class StoreRelatedValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class StoreRelatedValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'store_id' => 'required|exists:stores,id',
            'store_related_id' => 'required|exists:stores,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'store_id' => 'required|exists:stores,id',
            'store_related_id' => 'required|exists:stores,id'
        ],
    ];
}
