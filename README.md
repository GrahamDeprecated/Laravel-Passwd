Laravel Passwd
==============


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/GrahamCampbell/laravel-passwd/trend.png)](https://bitdeli.com/free "Bitdeli Badge")
[![Build Status](https://travis-ci.org/GrahamCampbell/Laravel-Passwd.png?branch=master)](https://travis-ci.org/GrahamCampbell/Laravel-Passwd)
[![Latest Version](https://poser.pugx.org/graham-campbell/passwd/v/stable.png)](https://packagist.org/packages/graham-campbell/passwd)
[![Total Downloads](https://poser.pugx.org/graham-campbell/passwd/downloads.png)](https://packagist.org/packages/graham-campbell/passwd)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-Passwd/badges/quality-score.png?s=e388e17e6a7baae31b5cd7ced1d71c9eb2f6e926)](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-Passwd)
[![Still Maintained](http://stillmaintained.com/GrahamCampbell/Laravel-Passwd.png)](http://stillmaintained.com/GrahamCampbell/Laravel-Passwd)


## What Is Laravel Passwd?

Laravel Passwd is a simple password generator for [Laravel 4](http://laravel.com).  

* Laravel Passwd was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell).  
* Laravel Passwd uses [Travis CI](https://travis-ci.org/GrahamCampbell/Laravel-Passwd) to run tests to check if it's working as it should.  
* Laravel Passwd uses [Scrutinizer CI](https://scrutinizer-ci.com/g/GrahamCampbell/Laravel-Passwd) to run additional tests and checks.  
* Laravel Passwd uses [Composer](https://getcomposer.org) to load and manage dependencies.  
* Laravel Passwd provides a [change log](https://github.com/GrahamCampbell/Laravel-Passwd/blob/master/CHANGELOG.md), [releases](https://github.com/GrahamCampbell/Laravel-Passwd/releases), and a [wiki](https://github.com/GrahamCampbell/Laravel-Passwd/wiki).  
* Laravel Passwd is licensed under the Apache License, available [here](https://github.com/GrahamCampbell/Laravel-Passwd/blob/master/LICENSE.md).  


## System Requirements

* PHP 5.3.3+, 5.4+ or PHP 5.5+ is required.
* You will need [Laravel 4](http://laravel.com) because this package is designed for it.  
* You will need [Composer](https://getcomposer.org) installed to load the dependencies of Laravel Passwd.  


## Installation

Please check the system requirements before installing Laravel Passwd.  

To get the latest version of Laravel Passwd, simply require it in your `composer.json` file.

`"graham-campbell/passwd": "dev-master"`

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel Passwd is installed, you need to register the service provider. Open up `app/config/app.php` and add the following to the `providers` key.

`'GrahamCampbell\Passwd\PasswdServiceProvider'`

You can register the Passwd facade in the `aliases` key of your `app/config/app.php` file if you like.

`'Passwd' => 'GrahamCampbell\Passwd\Facades\Passwd'`


## Updating Your Fork

The latest and greatest source can be found on [GitHub](https://github.com/GrahamCampbell/Laravel-Passwd).  
Before submitting a pull request, you should ensure that your fork is up to date.  

You may fork Laravel Passwd:  

    git remote add upstream git://github.com/GrahamCampbell/Laravel-Passwd.git

The first command is only necessary the first time. If you have issues merging, you will need to get a merge tool such as [P4Merge](http://perforce.com/product/components/perforce_visual_merge_and_diff_tools).  

You can then update the branch:  

    git pull --rebase upstream develop
    git push --force origin <branch_name>

Once it is set up, run `git mergetool`. Once all conflicts are fixed, run `git rebase --continue`, and `git push --force origin <branch_name>`.  


## Pull Requests

Please submit pull requests against my develop branch.  
  * I will never accept pull requests into the master branch.  
  * If you plan to fix a bug, please create a branch called `fix-`, followed by an appropriate name.  
  * If you plan to add a feature, please create a branch called `feature-`, followed by an appropriate name.  
  * Please indent with 4 spaces rather than tabs, and make sure your code is commented.  


## License

Apache License  

Copyright 2013 Graham Campbell  

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at  

 http://www.apache.org/licenses/LICENSE-2.0  

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.  
