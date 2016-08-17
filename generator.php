<?php

require_once 'core/figenator.class.php';

$figen = new figen();

$figen->tableName = 1;
$figen->className = 1;
$figen->primaryKey = 1;

/**
 * Database Settings
 */

$figen->dbHost = 1;
$figen->dbUser = 1;
$figen->$dbPass = 1;
$figen->dbName = 1;

$figen->generate();

?>
