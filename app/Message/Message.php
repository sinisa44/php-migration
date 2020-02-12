<?php

namespace App\Message;

class Message {
    public static function display_error( $message ) {
        echo  "\e[101mError: \e[41m " . $message . "\e[0m" . PHP_EOL; 
        exit;
    }

    public static function display_success( $message ) {
        echo "\e[97;5;253;102m Success: \e[42m " . $message  . " \e[0m" . PHP_EOL;
        
    }

    public static function display_info( $message ) {
        echo  "\e[44mInfo  \e[104m" . $message .  "\e[0m" .PHP_EOL;
    }

    public static function display_error_action( $message ) {
        echo "\e[101m".$message . "\e[0m" . PHP_EOL;
    }

    public static function color_text( $text, $color ) {
        return "\e[". $color ."  m " . $text . " \e[0m";
    }


}