<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=octgame',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ],
        'db2'=>[
            'class'=>'yii\db\Connection',
            'dsn'=>'mysql:host=127.0.0.1;dbname=ocenter',
            'username'=>'root',
            'password'=>'123456',
            'charset'=>'utf8'
        ],
        'db3'=>[
            'class'=>'yii\db\Connection',
            'dsn'=>'mysql:host=127.0.0.1;dbname=octlog',
            'username'=>'root',
            'password'=>'123456',
            'charset'=>'utf8'
        ],

    ],


];
