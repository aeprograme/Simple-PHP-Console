<?php

namespace Inc;

/**
 * Project : Simple Console
 * File : Command.php
 * Description : Command class
 * Author : AePrograme
 * Github : https://github.com/AePrograme
 */
class Command
{
    /**
     * Stores the commands
     * @var array
     */
    protected static $commands = [];
    /**
     * Add a command
     * @param string $command
     * @param callable $callback
     * @return void
     */
    public static function add(string $command, callable $callback, string $description = '')
    {
        // Add the command
        self::$commands[$command] = [
            'command' => $command, // keep original with {name}
            'callback' => $callback,
            'description' => $description,
        ];
    }
    /**
     * Run a command
     * @param string $command
     * @return void
     */
    public static function run(string $command)
    {
        $command = trim($command);
        // $command = strip_tags($command);
        // $command = htmlspecialchars($command);
        foreach (self::$commands as $pattern => $data) {
            $regex = preg_replace('/{(\w+)}/', '(?P<\1>[^ ]+)', $pattern);
            $regex = '#^' . $regex . '$#';

            if (preg_match($regex, $command, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                static::response($data['callback'](...$params));
                exit();
            }
        }
        static::response(sprintf('Command "%s" is not recognized', $command), 500);
    }
    /**
     * Send a response
     * @param mixed $contents
     * @param int $status
     * @return void
     */
    public static function response($contents, int $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($contents);
    }
    /**
     * Get all commands
     * @param bool $helper if set to true, will return the helper commands with command,description only
     * @return array
     */
    public static function all(bool $helper = false): array
    {
        if ($helper) {
            return array_map(fn($command) => "{$command['command']} - {$command['description']}", self::$commands);
        } else {
            return self::$commands;
        }
    }
}
