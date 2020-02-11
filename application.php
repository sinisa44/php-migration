<?php

// if( $argv['1']  == 'make:migration') {
//     echo $argv['2'];
//     shell_exec('php resources/file_creator.php '. $argv['2'] );
// }

// if( $argv['1']  == 'migrate' ) {
//     include_once( 'resources/table-creator.php' );
// }

switch ( $argv['1'] ) {
    case 'make:migration':
        exec( 'php resources/file_creator.php ' . $argv['2'], $o );
        echo $o['0'];
        break;
    
    case 'migrate':
        include_once( 'resources/table_creator.php' );
        break;
    case 'drop:table':
        exec( 'php resources/table_drop.php ' . $argv['2'], $o, $v );
      echo $o['0'];

    break;

    default:
        echo $argv['1'] . 'is not listed command';
        break;
}