<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class NewsletterValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class NewsletterValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => 'required|email'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'email' => 'required|email'
        ],
    ];
}
