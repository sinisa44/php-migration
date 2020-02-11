<?php

namespace App\Command;

use App\File\File;
use App\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

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
                    $class_name = $this->command['2'];
            
                    File::create_file( 'database/tables/', $this->command['2'] , include('resources/templates/migration.php') );
                    File::add_row( $this->command['2'], 'resources/files/table_names.txt' );
                break;
                
                case 'migrate':              
                    $table_names = file( 'resources/files/table_names.txt', FILE_IGNORE_NEW_LINES);
                    
                    $migration = new Migration( $table_names );
                    $migration->migrate();
                break;

                case 'drop:table':
                        Capsule::schema()->drop( $this->command['2'] );
                    
                        File::remove_row( $this->command['2'], 'resources/files/table_names.txt' );
                    
                        echo 'delete table ' . $this->command['2'] ;
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