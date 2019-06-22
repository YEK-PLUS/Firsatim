<?php
include __DIR__.'/core.php';
include __DIR__.'/functions.php';
include __DIR__.'/database.php';
include __DIR__.'/router.php';
include __DIR__.'/methods.php';

use Medoo\Medoo;

$DB = new DataBase(DB_CONF);
$METHODS = new Methods();
$MEDOO = new Medoo([
  'database_type' => 'mysql',
  'database_name' => DB_CONF["name"],
  'server' => DB_CONF["host"],
  'username' => DB_CONF["user"],
  'password' => DB_CONF["pass"]
]);

include __DIR__.'/ex-pages/load.php';
$ROUTER = new Router();
 ?>
