<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/db/mrzg.php',
    require __DIR__ . '/../config/db/tzcq.php',
    require __DIR__ . '/../config/db/lzcq.php',
    require __DIR__ . '/../config/db/lstx.php',
    require __DIR__ . '/../config/db/juren.php',
    require __DIR__ . '/../config/db/qxzb.php',
    require __DIR__ . '/../config/main-local.php'
);

(new yii\web\Application($config))->run();
