<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostTagValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class PostTagValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'post_id' => 'required|exists:posts,id',
            'tag_id' => 'required|exists:tags,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'post_id' => 'required|exists:posts,id',
            'tag_id' => 'required|exists:tags,id'
        ],
    ];
}
