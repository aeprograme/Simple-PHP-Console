<?php

//Define php version required 8.3
define('PHP_VERSION_REQUIRED', '8.3.0');

//check if current php is equal to or bigger than required version
if (version_compare(PHP_VERSION, PHP_VERSION_REQUIRED, '<')) {
    die('Your PHP version must be ' . PHP_VERSION_REQUIRED . ' or higher to run this script.');
}

/**
 * Application path
 */
define('APP_PATH', __DIR__ . '/inc');

//Require autoloader
require APP_PATH . '/Autoloader.php';

use Inc\App;
//Define the application
define('APP', new App());
//Run the app
APP->run();

//End the script
exit;
