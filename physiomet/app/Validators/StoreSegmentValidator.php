<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class StoreSegmentValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class StoreSegmentValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'store_id' => 'required|exists:stores,id',
            'segment_id' => 'required|exists:segments,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'store_id' => 'required|exists:stores,id',
            'segment_id' => 'required|exists:segments,id'
        ],
    ];
}
