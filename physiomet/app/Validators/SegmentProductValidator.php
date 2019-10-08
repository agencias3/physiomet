<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SegmentProductValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class SegmentProductValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'segment_id' => 'required|exists:segments,id',
            'product_id' => 'required|exists:products,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'segment_id' => 'required|exists:segments,id',
            'product_id' => 'required|exists:products,id'
        ],
    ];
}
