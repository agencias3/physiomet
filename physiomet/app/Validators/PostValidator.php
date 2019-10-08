<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PostValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'date_publish' => 'required|date_format:Y-m-d H:i:s',
            'active' => 'required',
            'seo_link' => 'required|max:255'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'date_publish' => 'required|date_format:Y-m-d H:i:s',
            'active' => 'required',
            'seo_link' => 'required|max:255'
        ],
    ];
}
