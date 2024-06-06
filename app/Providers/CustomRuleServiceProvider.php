<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomRuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('slug', function ($attribute, $value, $parameters, $validator) {
            // Define your custom validation logic here.
            return preg_match('/^((?![!@#$%^&*()=+\s]).)*$/', $value);
            // return preg_match('/^[a-zA-Z0-9ء-ي_-]+$/', $value);
        } , 'The :attribute field must contain only letters arabic or english , numbers, underscores (_), hyphens (-).');

       
    }
}
