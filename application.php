<?php

if( $argv['1']  == 'make:migration') {
    echo $argv['2'];
    shell_exec('resources/file_creator.php '. $argv['2'] );
}

if( $argv['1']  == 'migrate' ) {
    include_once( 'resources/table-creator.php' );
}