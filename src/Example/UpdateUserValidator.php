<?php namespace App\Validators;

use Eilander\Validator\LaravelValidator as Validator;

class UpdateUserValidator extends Validator
{
    public static $rules = array(
        'name'     => 'required',
        'email'    => 'required|email',
        'msg'  	   => 'required'
    );
}