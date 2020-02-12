<?php

namespace App\Command;


use App\Migrations\Migration;
use App\Database\Database;
use App\Test\Test;


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
                    Migration::migrate( file( 'resources/files/table_names.txt', FILE_IGNORE_NEW_LINES ) );
                break;

                case 'drop:table':
                    Database::drop_table( $this->command['2'], 'resources/files/table_names.txt' );
                break;

                case 'show:tables';
                    $table = 'Tables_in_'. getenv( 'DB_DATABASE' ); 
                    Database::show_tables( $table );
                break;

                case 'show:columns';
                    Database::show_columns( $this->command['2'] );
                break;

                case 'show:commands':
                    $this->display_commands( $this->command_list );
                break;

                case 'test:test':
                    Test::test();
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
                    ' ' . PHP_EOL.
                    '------------------------------------------------------' . PHP_EOL;
        }
    }
}