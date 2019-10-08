<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SegmentClientValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class SegmentClientValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'segment_id' => 'required:exists:segments,id',
            'client_id' => 'required|exists:clients,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'segment_id' => 'required:exists:segments,id',
            'client_id' => 'required|exists:clients,id'
        ],
    ];
}
