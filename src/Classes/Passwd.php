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

namespace GrahamCampbell\Passwd\Classes;

use Illuminate\Support\Str;

/**
 * This is the passwd class.
 *
 * @package    Laravel-Passwd
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-Passwd/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-Passwd
 */
class Passwd
{
    /**
     * Generate a new random password.
     *
     * @param  int  $length
     * @return string
     */
    public function generate($length = 16)
    {
        if (DIRECTORY_SEPARATOR == '/') {
            // if is linux, use the linux generator
            $password = $this->linux($length);
        } elseif (DIRECTORY_SEPARATOR == '\\') {
            // if is windows, use the windows generator
            $password = $this->windows($length);
        }

        if (strlen($password) < $length) {
            // fall back to laravel random generator
            $password = Str::random($length);
        } else {
            // clean up the password
            $password = $this->limit($password, $length);
        }

        return (string) utf8_encode($password);
    }

    /**
     * Generate random bytes on linux
     *
     * @param  int  $length
     * @return string
     */
    protected function linux($length)
    {
        $password = '';

        $fp = @fopen('/dev/urandom', 'rb');
        if ($fp !== false) {
            $password .= @fread($fp, $length * 2);
            @fclose($fp);
        }

        return $password;
    }

    /**
     * Generate random bytes on windows
     *
     * @param  int  $length
     * @return string
     */
    protected function windows($length)
    {
        $password = '';

        if (@class_exists('COM')) {
            try {
                $CAPI_Util = new \COM('CAPICOM.Utilities.1');
                $password .= $CAPI_Util->GetRandom($length * 2, 0);
                if ($password) {
                    $password = md5($password, true);
                }
            } catch (\Exception $e) {
                $password = '';
            }
        }

        return $password;
    }

    /**
     * Limits the length and content of a string.
     *
     * @param  string  $bytes
     * @param  int     $length
     * @return string
     */
    protected function limit($bytes, $length)
    {
        return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
    }
}
