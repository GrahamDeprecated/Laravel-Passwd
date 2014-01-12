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

namespace GrahamCampbell\Tests\Passwd\Classes;

use GrahamCampbell\Passwd\Classes\Passwd;
use GrahamCampbell\TestBench\Classes\AbstractTestCase;

/**
 * This is the passwd test class.
 *
 * @package    Laravel-Passwd
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-Passwd/blob/develop/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-Passwd
 */
class PasswdTest extends AbstractTestCase
{
    public function testAll()
    {
        // this test is rubbish for many reasons
        // one issue is we can't test windows specific operations on travis
        // this test is here as a very basic check that the class works

        $passwd = $this->getPasswd();

        $return = $passwd->generate();

        $this->assertEquals(16, strlen($return));
    }

    protected function getPasswd()
    {
        return new Passwd();
    }
}
