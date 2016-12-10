<?php

namespace Eilander\Validator\Providers;

use Eilander\Validator\ValidatorExtended;
use Illuminate\Support\ServiceProvider;

/**
 * Class GatewayServiceProvider.
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
     * @return void
     */
    public function boot()
    {
        $this->app->validator->resolver(function ($translator, $data, $rules, $messages = [], $customAttributes = []) {
            return new ValidatorExtended($translator, $data, $rules, $messages, $customAttributes);
        });
    }

    /**
     * @return void
     */
    public function register()
    {
    }
}
