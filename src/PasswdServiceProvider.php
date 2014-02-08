<?php

/**
 * This file is part of Laravel Passwd by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GrahamCampbell\Passwd;

use Illuminate\Support\ServiceProvider;

/**
 * This is the passwd service provider class.
 *
 * @package    Laravel-Passwd
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-Passwd/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-Passwd
 */
class PasswdServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('graham-campbell/passwd', 'graham-campbell/passwd', __DIR__);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPasswd();
    }

    /**
     * Register the passwd class.
     *
     * @return void
     */
    protected function registerPasswd()
    {
        $this->app->bindShared('passwd', function ($app) {
            return new Classes\Passwd();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(
            'passwd'
        );
    }
}
