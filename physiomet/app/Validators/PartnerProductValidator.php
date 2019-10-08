<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PartnerProductValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PartnerProductValidator extends LaravelValidator
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
