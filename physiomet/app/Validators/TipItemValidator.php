<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TipItemValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TipItemValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'tip_id' => 'required|exists:tips,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'tip_id' => 'required|exists:tips,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
    ];
}
