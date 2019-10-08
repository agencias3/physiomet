<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class BannerValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class SegmentValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:191',
            'active' => 'required',
            'seo_link' => 'required|max:191'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3|max:191',
            'active' => 'required',
            'seo_link' => 'required|max:191'
        ],
    ];
}
