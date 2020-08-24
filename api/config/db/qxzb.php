<?php
return [
    'components' => [
        'QXZB_18_1_octgame' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost:3314;dbname=octgame',
            'username' => 'root',
            'password' => '123456',
        ],
        'QXZB_18_1_ocenter' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost:3315;dbname=ocenter',
            'username' => 'root',
            'password' => '123456',
        ],
        'QXZB_18_1_octlog' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost:3315;dbname=octlog',
            'username' => 'root',
            'password' => '123456',
        ],
    ],
];
