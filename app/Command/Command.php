<?php

namespace App\Command;

class Command {
    private $command;
    private $command_list;

    public function __construct( $command, $command_list ) {
        $this->command      = $command;
        $this->command_list =  $command_list ;
    }

    public function call_command() {
       
            switch ( $this->command['1'] ) {
                case 'make:migration':
                    $this->execute_command( 'php resources/file_creator.php ' . $this->command['2'], 0 );
                break;
                
                case 'migrate':
                    include_once( 'resources/table_creator.php' );
                break;

                case 'drop:table':
                    $this->execute_command( 'php resources/table_drop.php ' . $this->command['2'], 0 );
                break;

                case 'show:commands':
                    $this->display_commands( $this->command_list );
                break;

                default:
                    echo $this->command['1'] . ' command is not set ';
                break;
            }
        
        
    }

    private function display_commands( $command_list ) {
        $commands = require_once( $command_list );

        foreach( $commands['commands'] as $command ) {
            echo   'name          =>   ' .  $command['name']. PHP_EOL.
                   'description   =>   ' .  $command['description']. PHP_EOL .
                   'command       =>   ' .  $command['command']. PHP_EOL .
                    ' ' . PHP_EOL;
        }
    }

    private function execute_command( $command, $option ) {
        exec( $command, $o );
        echo $o[$option];
    }
}