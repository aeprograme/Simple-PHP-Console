<?php

/**
 * Project : Simple Console
 * File : Console.php
 * Description : Console commands
 * Author : AePrograme
 * Github : https://github.com/AePrograme
 */

use Inc\Command;

Command::add('greet {name}', fn($name) => $name, 'Greet someone');
Command::add('time', fn() => 'Current server time: ' . date('H:i:s'), 'Show server time');
Command::add('date', fn() => 'Current server date: ' . date('H:i:s'), 'Show server date');
Command::add('help', fn() => "Available commands:\n" . implode("\n", Command::all(true)), 'Show available commands');
Command::add('hello {name}', fn($name) => "Indeed, hello " . $name, 'Say hello to someone');
Command::add('github', fn() => 'https://github.com/AePrograme', 'Show GitHub repository link');
