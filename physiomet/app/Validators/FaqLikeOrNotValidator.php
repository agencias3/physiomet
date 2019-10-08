<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class FaqLikeOrNotValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class FaqLikeOrNotValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'faq_id' => 'required|exists:faqs,id',
            'like' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'faq_id' => 'required|exists:faqs,id',
            'like' => 'required'
        ],
    ];
}
