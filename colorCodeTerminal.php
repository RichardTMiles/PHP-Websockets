<?php

/**
 * @param string $message
 * @param string $color
 * @param bool $exit
 * @param int $priority
 * @link https://www.php.net/manual/en/function.syslog.php
 */
function colorCode(string $message, string $color = 'green', bool $exit = false, int $priority = LOG_INFO): void
{
    $colors = array(
        // styles
        // italic and blink may not work depending of your terminal
        'bold' => "\033[1m%s\033[0m",
        'dark' => "\033[2m%s\033[0m",
        'italic' => "\033[3m%s\033[0m",
        'underline' => "\033[4m%s\033[0m",
        'blink' => "\033[5m%s\033[0m",
        'reverse' => "\033[7m%s\033[0m",
        'concealed' => "\033[8m%s\033[0m",
        // foreground colors
        'black' => "\033[30m%s\033[0m",
        'red' => "\033[31m%s\033[0m",
        'green' => "\033[32m%s\033[0m",
        'yellow' => "\033[33m%s\033[0m",
        'blue' => "\033[34m%s\033[0m",
        'magenta' => "\033[35m%s\033[0m",
        'cyan' => "\033[36m%s\033[0m",
        'white' => "\033[37m%s\033[0m",
        // background colors
        'background_black' => "\033[40m%s\033[0m",
        'background_red' => "\033[41m%s\033[0m",
        'background_green' => "\033[42m%s\033[0m",
        'background_yellow' => "\033[43m%s\033[0m",
        'background_blue' => "\033[44m%s\033[0m",
        'background_magenta' => "\033[45m%s\033[0m",
        'background_cyan' => "\033[46m%s\033[0m",
        'background_white' => "\033[47m%s\033[0m",
    );

    if (!array_key_exists($color, $colors)) {
        $color = 'red';
        colorCode("Color provided to color code ($color) is invalid, message caught '$message'", 'red');
    }

    $colorCodex = sprintf($colors[$color], $message);

    /** @noinspection ForgottenDebugOutputInspection */
    error_log($colorCodex);    // do not double quote args passed here

    if ($exit) {
        exit($message);
    }
}
