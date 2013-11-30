<?php namespace GrahamCampbell\Passwd\Classes;

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
 *
 * @package    Laravel-Passwd
 * @author     Graham Campbell
 * @license    Apache License
 * @copyright  Copyright 2013 Graham Campbell
 * @link       https://github.com/GrahamCampbell/Laravel-Passwd
 */

use Illuminate\Support\Str;

class Passwd {

    /**
     * Generate a new random password.
     *
     * @param  int  $length
     * @return string
     */
    public function generate($length = 16) {
        $password = '';

        while (strlen($password) !== $length) {
            $password .= preg_match('/[^a-zA-Z0-9\.]/', $this->random(($length - strlen($password)) * 2));
            if (strlen($password) > $length) {
                $password = substr($password, 0, $length);
            }
        }

        return $password;
    }

    /**
     * Generate a new random string.
     *
     * @param  int  $length
     * @return string
     */
    protected function random($length) {
        $string = '';

        $fp = @fopen('/dev/urandom','rb');
        if ($fp !== FALSE) {
            $string .= @fread($fp,$length);
            @fclose($fp);
        }

        if (@class_exists('COM')) {
            try {
                $CAPI_Util = new COM('CAPICOM.Utilities.1');
                $string .= $CAPI_Util->GetRandom($length, 0);
                if ($string) {
                    $string = md5($string, true);
                }
            } catch (Exception $ex) {}
        }

        if (strlen($string) < $length) {
            $string = Str::random($length);
        }

        return $string;
    }
}
