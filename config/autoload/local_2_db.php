<?php
// zf3-tutorial/config/autoload/local.php
return
[
'db' => [
        'adapters' => [
            'db1' => [
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=database1;host=localhost',
                'driver_options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ],
                'username' => 'test',
                'password' => 'test',
            ],
            'db2' => [
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=database2;host=localhost',
                'driver_options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ],
                'username' => 'test',
                'password' => 'test',
            ],
        ],
    ],
];
