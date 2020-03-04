<?php

namespace App\Message;

class Message {

    /**
     *Display error message
     *
     * @param string $message
     * 
     * @return string
     */
    
    public static function display_error( $message ) {
        return  "\e[101mError: \e[41m " . $message . "\e[0m" . PHP_EOL; 
        exit;
    }

        /**
     *Display success message
     *
     * @param string $message
     * 
     * @return string
     */

    public static function display_success( $message ) {
        return "\e[97;5;253;102m Success: \e[42m " . $message  . " \e[0m" . PHP_EOL;
    }


    /**
     *Display info message
     *
     * @param string $message
     * 
     * @return string
     */

    public static function display_info( $message ) {
        return  "\e[44mInfo  \e[104m" . $message .  "\e[0m" .PHP_EOL;
    }

    /**
     *Display error action
     *
     * @param string $message
     * 
     * @return string
     */

    public static function display_error_action( $message ) {
        return "\e[101m".$message . "\e[0m" . PHP_EOL;
    }
    
    /**
     *Color text
     *
     * @param string $text
     * @param int $color
     * 
     * @return string
     */

    public static function color_text( $text, $color ) {
        return "\e[". $color ."  m " . $text . " \e[0m";
    }


}