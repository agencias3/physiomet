<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PartValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PartValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'category_id' => 'required|exists:category_parts,id',
            'name' => 'required|min:3|max:191',
            'active' => 'required',
            'seo_link' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'category_id' => 'required|exists:category_parts,id',
            'name' => 'required|min:3|max:191',
            'active' => 'required',
            'seo_link' => 'required'
        ],
    ];
}
