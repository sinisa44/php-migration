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
                    Migration::make_migration( $this->command['2'], 'resources/templates/migration.php', 'resources/files/table_names.txt' );
                break;
                
                case 'migrate':              
                    $table_names = file( 'resources/files/table_names.txt', FILE_IGNORE_NEW_LINES);   
                    $migration = new Migration( $table_names );
                    $migration->migrate();
                break;

                case 'drop:table':
                    Migration::drop_migration( $this->command['2'], 'resources/files/table_names.txt' );
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
}