<?php

namespace App\Command;

use App\File\File;
use App\Message\Message;;

class Command {

    /**
     * The entry command from cli
     * 
     * @var string
     * 
     */
    private $command;


    /**
     * Class constructor
     * 
     * @param string $command 
     * 
     * @param aray $command_list
     */
    public function __construct( $command, $command_list ) {
        $this->command      = $command;
        $this->command_list =  $command_list ;
    }

   /**
    *The command runner
    *
    *@return void
    */
    public function call_command() {

        switch( $this->command['1']) {
        case 'make:command':
            $class_name = $this->command['2'];
            File::create_file( 'app/Console/', $class_name, include('resources/templates/command.php'));
        
        case 'show:commands':
            $files = scandir( 'app/console', 1 );
            array_splice( $files, -2, 2 );

            $commands = array();
            for( $i = 0; $i < count( $files ); $i ++ ) {
                $name = rtrim( $files[$i], '.php' );
                require_once( 'app/Console/'. $name . '.php' );
                $name = new $name;

                $commands[] = $name;
            }

            $this->display_commands( $commands );
           
        
        default:
            $files = scandir( 'app/console',1 );
            array_splice( $files, -2, 2 );
        
            
            for( $i = 0; $i < count( $files ); $i ++ ) {
                $name = rtrim( $files[$i], '.php' );
            
                require_once( 'app/Console/'.$name. '.php' );

                $name = new $name;

                if( $name->get_name() == $this->command['1'] ) {
                    if( ! empty( $this->command['2'] ) ) {
                        $name->run( $this->command['2'] );
                    }else{
                        $name->run();
                    }
                }
            }
        
        }
    }

    /**
     * Display available command
     * 
     * @param object $command_list
     * 
     * @return void
     */
    private function display_commands( $command_list ) {
        
        foreach( $command_list as $cl ) {
           echo     Message::color_text( 'name        ', '44' ) . 
                    Message::color_text( ' =>  ', '104') .
                    Message::color_text( $cl->get_name(), '44') . PHP_EOL .
                    Message::color_text( 'description ', '44' ) .
                    Message::color_text( ' =>  ', '104' ) .
                    Message::color_text( $cl->get_description(), '44' ) . PHP_EOL .
                    Message::color_text( 'command     ', '44' ) . 
                    Message::color_text( ' =>  ', '104' ).
                    Message::color_text( $cl->get_name(), '44' ) . PHP_EOL.PHP_EOL;
        
        
        }
    }
}