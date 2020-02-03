<?php

// $arr = explode( "\n", file_get_contents('resources/table_names.txt') );
$arr = file( 'resources/table_names.txt', FILE_IGNORE_NEW_LINES);
print_r( $arr);