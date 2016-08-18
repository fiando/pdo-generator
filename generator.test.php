<?php

/**
 * Generator File
 */
if(!isset($_POST['generate'])) {
  header('location: index.php');
}
require_once 'core/figenator.class.php';

$figen = new figenator();

$figen->tableName = 'Bobby';
$figen->className = 'Bobby';
$figen->primaryKey = 'id';

/**
 * Database Settings
 */

$figen->dbHost = 'localhost';
$figen->dbUser = 'root';
$figen->dbPass = '';
$figen->dbName = 'mydb';


$figen->generate();

// var_dump($figen->dataSettings);
// var_dump($figen->dataClass);
// var_dump($figen->dataIndex);
// var_dump(indexTemplate($figen->dataIndex));
?>
