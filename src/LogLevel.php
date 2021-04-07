<?php

namespace ScoobyConsoleLogger;

abstract class LogLevel extends \Psr\Log\LogLevel
{
    const DIVIDER = 'divider';
    const ECHO = 'echo';
    const SUCCESS = 'success';
    const TITLE = 'title';
}