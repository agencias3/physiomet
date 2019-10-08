<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PostImageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'post_id' => 'required|exists:posts,id',
            'image' => 'required',
            'cover' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
        ],
    ];
}
