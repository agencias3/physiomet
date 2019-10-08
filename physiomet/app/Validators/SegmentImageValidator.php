<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SegmentImageValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class SegmentImageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'segment_id' => 'required|exists:segments,id',
            'image' => 'required',
            'cover' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
