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

        $fp = @fopen('/dev/urandom','rb');
        if ($fp !== false) {
            $password .= @fread($fp, $length * 2);
            @fclose($fp);
            $password = $this->limit($password, $length);
        }

        if (@class_exists('COM')) {
            try {
                $CAPI_Util = new COM('CAPICOM.Utilities.1');
                $password .= $CAPI_Util->GetRandom($length * 2, 0);
                if ($password) {
                    $password = md5($password, true);
                }
                $password = $this->limit($password, $length);
            } catch (Exception $ex) {}
        }

        if (strlen($password) < $length) {
            $password = Str::random($length);
        }

        return (string)utf8_encode($password);
    }

    protected function limit($bytes, $length) {
        return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
    }
}
