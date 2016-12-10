<?php

namespace Eilander\Validator;

use Eilander\Validator\Contracts\ValidatorInterface;
use Illuminate\Validation\Factory;

/**
 * Class LaravelValidator.
 */
abstract class LaravelValidator implements ValidatorInterface
{
    protected $errors;
    protected static $rules;
    protected static $messages = [];

    /**
     * Validator.
     *
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * Construct.
     *
     * @param \Illuminate\Validation\Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    public function fails(array $input, $type, array $rules)
    {
        $validationRules = static::$rules;
        // use static propertu
        if (isset(static::$rules[$type])) {
            $validationRules = static::$rules[$type];
        }
        // use custom rules
        if (count($rules)) {
            $validationRules = $rules;
        }

        $validation = $this->validator->make($input, $validationRules, static::$messages);

        if ($validation->fails()) {
            $this->errors = $validation->messages();

            return true;
        }

        return false;
    }

    public function messages()
    {
        return $this->errors;
    }

    public function addRule($field, $rule)
    {
        if (isset(static::$rules[$field])) {
            static::$rules[$field] .= '|'.$rule;
        } else {
            static::$rules[$field] = $rule;
        }
    }
}
