<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PartnerContactValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PartnerContactValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'partner_id' => 'required|exists:partners,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'partner_id' => 'required|exists:partners,id'
        ],
    ];
}
