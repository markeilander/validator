<?php

namespace Eilander\Validator\Providers;

use Illuminate\Support\ServiceProvider;
use Eilander\Validator\ValidatorExtended;

/**
 * Class GatewayServiceProvider
 * @package Eilander\Gateway\Providers
 */
class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     *
     * @return void
     */
    public function boot()
    {
        $this->app->validator->resolver( function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
			return new ValidatorExtended( $translator, $data, $rules, $messages, $customAttributes );
		});
    }

    /**
     *
     * @return void
     */
    public function register()
    {

    }
}
