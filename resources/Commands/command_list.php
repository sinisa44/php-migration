<?php

return [
    'commands'=>[
        [
            'name'        => 'make:migration',
            'description' => 'creates new table',
            'command'      => 'php application make:migration TableName_table'
        ],
        [
            'name'        => 'migrate',
            'description' => 'migrate table to database',
            'command'     => 'php application migrate'
        ],
        [
            'name'        => 'drop:table',
            'description' => 'drops table from database',
            'command'     => 'php application drop:table TableName_table'
        ],
        [
            'name'        => 'show:commands',
            'description' => 'show all commands',
            'command'     => 'php application show:commands'
        ],
        [
            'name'        => 'show:columns',
            'description' => 'show column type for specific table',
            'command'     => 'php application show:columns TableName'
        ],
        [
            'name'        => 'show:tables',
            'description' => 'list all tables from current database',
            'command'     => 'php application show:tables'
        ],
      
    ],
   
];