<?php

namespace Eilander\Validator\Contracts;

/**
 * Interface ValidatorInterface.
 */
interface ValidatorInterface
{
    /**
     * Check if there are any validation errors.
     *
     * @param $input
     *
     * @return $this
     */
    public function fails(array $input, $type, array $rules);

    /**
     * Errors.
     *
     * @return array
     */
    public function messages();

    /**
     * Set Rules for Validation.
     *
     * @param array $rules
     *
     * @return $this
     */
    public function addRule($field, $rule);
}
