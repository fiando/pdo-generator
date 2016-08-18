<?php
session_start();
/**
 * Generator File
 */
if(!isset($_POST['generate'])) {
  header('location: index.php');
}

require_once 'core/figenator.class.php';

$figen = new figenator();

$figen->tableName = @$_POST['tableName'];
$figen->className = @$_POST['className'];
$figen->primaryKey = @$_POST['keyField'];

/**
 * Database Settings
 */

$figen->dbHost = 'localhost';
$figen->dbUser = 'root';
$figen->dbPass = '';
$figen->dbName = 'mydb';


$figen->generate();
$_SESSION['msg'] = 'Generate File OK';
header('location: index.php');

?>
