<?php

namespace Eilander\Validator;

use Illuminate\Validation\Validator as IlluminateValidator;

class ValidatorExtended extends IlluminateValidator {

	protected $messages = array(
		"extended_alpha_num" => "The :attribute may only contain letters, spaces, and dashes.",
		"hexadecimal" => "The :attribute must follow format #[a-fA-F0-9]",
	);

	public function __construct( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
		parent::__construct( $translator, $data, $rules, $messages, $customAttributes );
		$this->setCustomMessages( $this->messages );
	}

	/**
	 * Allow only alphabets, spaces and dashes (hyphens and underscores)
	 *
	 * @param string $attribute
	 * @param mixed $value
	 * @return bool
	 */
	protected function validateExtendedAlphaNum( $attribute, $value) {
		return preg_match("/^[\pL\pM\pN\s_\-?!\"#$%&'@.,:;\/\(\)\]\[]+$/u", $value);
	}
	/**
	 * Hexadecimal
	 *
	 * @param string $attribute
	 * @param mixed $value
	 * @return bool
	 */
	protected function validateHexadecimal( $attribute, $value) {
		return preg_match("/^#[a-fA-F0-9]{6}$/i", $value);
	}
}	//end of class
