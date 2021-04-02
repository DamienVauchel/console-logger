<?php

namespace DvConsoleLogger;

class ConsoleLogger
{
    const BLUE = '34';
    const CYAN = '36';
    const GREEN = '32';
    const MAGENTA = '35';
    const RED = '31';
    const YELLOW = '33';

    public static function divider(string $char = '=', int $number = 65, string $color = ''): void
    {
        $divider = '';

        for ($i = 0; $i < $number; ++$i) {
            $divider .= $char;
        }

        switch ($color) {
            case 'pink':
                $color = self::MAGENTA;
                break;
            case 'blue':
                $color = self::CYAN;
                break;
            default:
                $color = '0';
        }

        echo self::echoMessage($divider, $color);
    }

    public static function echo(string $message): void
    {
        echo self::echoMessage($message);
    }

    public static function info(string $message, bool $showTitle = true): void
    {
        echo self::echoMessage($message, self::BLUE, 'INFO', $showTitle);
    }

    public static function error(string $message, bool $showTitle = true): void
    {
        echo self::echoMessage($message, self::RED, 'ERROR', $showTitle);
    }

    public static function pinkTitle(string $message, bool $showTitle = true): void
    {
        echo self::echoMessage($message, self::MAGENTA, 'TITLE', $showTitle);
    }

    public static function success(string $message, bool $showTitle = true): void
    {
        echo self::echoMessage($message, self::GREEN, 'SUCCESS', $showTitle);
    }

    public static function title(string $message, bool $showTitle = true): void
    {
        echo self::echoMessage($message, self::CYAN, 'TITLE', $showTitle);
    }

    public static function warning(string $message, bool $showTitle = true): void
    {
        echo self::echoMessage($message, self::YELLOW, 'WARNING', $showTitle);
    }

    private static function echoMessage(string $message, string $color = '0', string $title = '', bool $showTitle = false): string
    {
        return "\033[".$color."m".self::setMessageDisplay($message, $title, $showTitle)."\033[0m".PHP_EOL;
    }

    private static function setMessageDisplay(string $message, string $title, bool $showTitle = true): string
    {
        if (true === $showTitle) {
            $message = $title.': '.$message;
        }

        return $message;
    }
}
