<?php

namespace Inc;

use Inc\Command;

/**
 * Project : Simple Console
 * File : App.php
 * Description : Application class
 * Author : AePrograme
 * Github : https://github.com/AePrograme
 */
class App
{
    /**
     * Run the app
     * @return void
     */
    public function __invoke()
    {
        $this->run();
    }
    /**
     * Run the app
     */
    public function run()
    {
        //Require commands
        require APP_PATH . '/Console.php';
        //Check if the request is json
        if ($this->requestIsJson()) {
            $this->capture();
        } else {
            $this->view();
        }
    }
    /**
     * Capture the request
     * @return void
     */
    public function capture()
    {
        $data =  json_decode(file_get_contents('php://input'), true) ?? [];
        Command::run($data['command']);
    }
    /**
     * Render the view
     * @return void
     */
    public function view()
    {
        require APP_PATH . '/View.php';
    }
    /**
     * Get the config
     * @return array
     */
    public function config(): array
    {
        return require APP_PATH . '/Config.php';
    }

    public function requestIsJson(): bool
    {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        return stripos($contentType, 'application/json') !== false;
    }
}
