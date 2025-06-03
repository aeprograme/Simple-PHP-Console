<?php

/**
 * Project : Simple Console
 * File : Autoloader.php
 * Description : Autoloader
 * Author : AePrograme
 * Github : https://github.com/AePrograme
 */
spl_autoload_register(function ($class) {
    //remove Inc from start
    $class = str_replace('Inc\\', '', $class);
    $path = APP_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        return require_once $path;
    }
});
