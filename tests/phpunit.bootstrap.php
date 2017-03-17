<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('America/Vancouver');

$site_path = realpath(dirname(__FILE__));// strip the /web from it

define('__SITE_PATH', str_replace('/tests', '', $site_path));

define('__CACHE_DIRECTORY', $site_path . '/tests/cache/');
//include_once('phpunit.configuration.php');
require_once (__SITE_PATH . '/vendor/autoload.php');
require_once(__SITE_PATH . '/vendor/composer/ClassLoader.php');
//require_once 'phpunit.systemfunctions.php';
$loader = new Composer\Autoload\ClassLoader();


// register classes with namespaces
//      $loader->add('Gossamer\\Caching', __SITE_PATH.'/../vendor/gossamer/caching/src');
//      $loader->add('Gossamer', __SITE_PATH .'/../vendor/gossamer/pesedget/src');
//      $loader->add('Monolog', __SITE_PATH.'/../vendor/monolog/monolog/src');

$loader->add('Mailgun', __SITE_PATH . '/vendor/mailgun/mailgun-php/src');
$loader->add('Gossamer', __SITE_PATH . '/src');

// activate the autoloader
$loader->register();

// to enable searching the include path (eg. for PEAR packages)
$loader->setUseIncludePath(true);
