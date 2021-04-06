<?php

namespace DvConsoleLogger;

use Psr\Log\AbstractLogger;

class ConsoleLogger extends AbstractLogger
{
    /** @var string */
    private $dateFormat;
    
    public function __construct(string $dateFormat = 'd-m-Y H:i:s')
    {
        $this->dateFormat = $dateFormat;         
    }

    public function divider(string $char = '=', int $number = 65, string $color = ConsoleColor::RESET): self
    {
        $divider = '';

        for ($i = 0; $i < $number; ++$i) {
            $divider .= $char;
        }

        $this->log(LogLevel::DIVIDER, $divider, ['color' => $color, 'showTitle' => false, 'showDate' => false]);

        return $this;
    }

    /** @param string $message */
    public function alert($message, array $context = []): self
    {
        $this->log(LogLevel::ALERT, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function critical($message, array $context = []): self
    {
        $this->log(LogLevel::CRITICAL, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function debug($message, array $context = []): self
    {
        $this->log(LogLevel::DEBUG, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function emergency($message, array $context = []): self
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function error($message, array $context = []): self
    {
        $this->log(LogLevel::ERROR, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function info($message, array $context = []): self
    {
        $this->log(LogLevel::INFO, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function notice($message, array $context = []): self
    {
        $this->log(LogLevel::NOTICE, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function success($message, array $context = []): self
    {
        $this->log(LogLevel::SUCCESS, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function title($message, array $context = []): self
    {
        $this->log(LogLevel::TITLE, $message, $context);

        return $this;
    }

    /** @param string $message */
    public function warning($message, array $context = []): self
    {
        $this->log(LogLevel::WARNING, $message, $context);

        return $this;
    }

    public function echo(string $message, array $context = []): self
    {
        if (!isset($context['showTitle'])) {
            $context['showTitle'] = false;
        }

        $this->log(LogLevel::ECHO, $message, $context);

        return $this;
    }

    public function setDateFormat(string $dateFormat): self
    {
        $this->dateFormat = $dateFormat;

        return $this;
    }

    /**
     * @param mixed $level
     * @param string $message
     */
    public function log($level, $message, array $context = []): self
    {
        $color = ConsoleColor::RESET;
        $title = strtoupper($level);

        switch ($level) {
            case LogLevel::ALERT:
                $color = ConsoleColor::BRIGHT_RED;
                break;
            case LogLevel::CRITICAL:
                $color = ConsoleColor::RED_BG;
                break;
            case LogLevel::EMERGENCY:
                $color = ConsoleColor::YELLOW_BG;
                break;
            case LogLevel::ERROR:
                $color = ConsoleColor::RED;
                break;
            case LogLevel::INFO:
                $color = ConsoleColor::CYAN;
                break;
            case LogLevel::NOTICE:
                $color = ConsoleColor::BLUE_BG;
                break;
            case LogLevel::SUCCESS:
                $color = ConsoleColor::GREEN;
                break;
            case LogLevel::TITLE:
                $color = ConsoleColor::MAGENTA;
                break;
            case LogLevel::WARNING:
                $color = ConsoleColor::YELLOW;
                break;
            default:
        }

        if (isset($context['color'])) {
            $color = $context['color'];
        }

        echo "\033[".$color."m".$this->setMessageDisplay($message, $title, $context)."\033[".ConsoleColor::RESET.'m'.PHP_EOL;

        return $this;
    }

    private function setMessageDisplay(
        string $message,
        string $title,
        array $context
    ): string
    {
        $infos = '';

        if (!isset($context['showDate']) || (is_bool($context['showDate']) && true === $context['showDate'])) {
            $infos .= (new \DateTime())->format($this->dateFormat).' - ';
        }

        if (!isset($context['showTitle']) || (is_bool($context['showTitle']) && true === $context['showTitle'])) {
            $infos .= $title.' - ';
        }

        return $infos.$message;
    }
}
