<?php 
namespace Eilander\Validator\Contracts;

use Illuminate\Contracts\Support\MessageBag;
use Eilander\Validator\Exceptions\ValidatorException;

/**
 * Interface ValidatorInterface
 * @package Eilander\Validator\Contracts
 */
interface ValidatorInterface {

    /**
     * Check if there are any validation errors
     *
     * @param $input
     * @return $this
     */
    public function fails(array $input);

    /**
     * Errors
     *
     * @return array
     */
    public function messages();

    /**
     * Set Rules for Validation
     *
     * @param array $rules
     * @return $this
     */
    public function addRule($field, $rule);
}