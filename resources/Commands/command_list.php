<?php

return [
    'commands'=>[
        [
            'name'        => 'make:migration',
            'description' => 'creates new table',
            'command'      => 'php cmd make:migration TableName_table'
        ],
        [
            'name'        => 'migrate',
            'description' => 'migrate table to database',
            'command'     => 'php cmd migrate'
        ],
        [
            'name'        => 'drop:table',
            'description' => 'drops table from database',
            'command'     => 'php cmd drop:table TableName_table'
        ],
        [
            'name'        => 'show:commands',
            'description' => 'show all commands',
            'command'     => 'php cmd show:commands'
        ],
        [
            'name'        => 'show:columns',
            'description' => 'show column type for specific table',
            'command'     => 'php cmd show:columns TableName'
        ],
        [
            'name'        => 'show:tables',
            'description' => 'list all tables from current database',
            'command'     => 'php cmd show:tables'
        ],
        [
            'name'        => 'rename:table',
            'description' => 'renames table in current database',
            'command'     => 'php cmd rename:table'
        ],
      
    ],
   
];