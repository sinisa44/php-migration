<?php

return [
    'commands'=>[
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
    ]
];