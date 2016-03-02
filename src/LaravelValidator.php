<?php 
namespace Eilander\Validator;

use Illuminate\Validation\Factory;
use Eilander\Validator\Contracts\ValidatorInterface;

/**
 * Class LaravelValidator
 * @package Eilander\Validator
 */
abstract class LaravelValidator implements ValidatorInterface {

    protected $errors;
    protected static $rules;
    protected static $messages = array();

    /**
     * Validator
     *
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * Construct
     *
     * @param \Illuminate\Validation\Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    public function fails(array $input, $type = '')
    {
        $validationRules = static::$rules;
        if (isset(static::$rules[$type])) {
            $validationRules = static::$rules[$type];
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