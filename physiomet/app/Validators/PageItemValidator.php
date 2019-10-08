<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PageItemValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PageItemValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'page_id' => 'required|exists:pages,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'page_id' => 'required|exists:pages,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
    ];
}
