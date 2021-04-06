<?php

require_once __DIR__.'/vendor/autoload.php';

use DvConsoleLogger\ConsoleLogger;
use DvConsoleLogger\ConsoleColor;

$consoleLogger = new ConsoleLogger();

$consoleLogger->echo('Normal divider', ['showDate' => false])
    ->divider();

$consoleLogger->echo('Custom divider', ['showDate' => false])
    ->divider('o', 40, ConsoleColor::MAGENTA);
