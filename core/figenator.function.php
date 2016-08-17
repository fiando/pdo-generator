<?php

$copy = function() {
  $today = date("F j, Y, g:i a");
  $year = date("Y");

  $template = <<<HTML
/**
 * Generated By Figenator $today
 * PDO MySQL Generator
 *
 * link github
 * link author
 *
 * $year
 */

HTML;

  return $template;
};

function settingsTemplate($dataSettings = array()) {

  $default = array(
    "dbHost" => "localhost" ,
    "dbUser" => "root" ,
    "dbPassword" => "" ,
    "dbName" => "" ,
  );

  extract($dataSettings, EXTR_OVERWRITE);
  extract($default, EXTR_SKIP);

  $ini     = <<<HTML
[SQL]
host     = $dbHost
user     = $dbUser
password = $dbPassword
dbname   = $dbName

HTML;

  return $ini;
}

function indexTemplate($dataIndex = array()) {
  global $copy;

  $default = array(
    "className" => 'defaultClass'
  );

  extract($dataIndex, EXTR_OVERWRITE);
  extract($default, EXTR_SKIP);

  $template = <<<HTML
<?php
  require("$className.class.php");
  \$className  = new $className();

HTML;

  return $template;
}

function classTemplate($dataClass = array()) {
  global $copy;

  $default = array(
    "easyCrudPath" => '../libs/easyCRUD.class.php' ,
    "className" => 'defaultClass',
    "tableName" => 'defaultTable',
    "primaryKey" => 'id',
  );

  extract($dataClass, EXTR_OVERWRITE);
  extract($default, EXTR_SKIP);

  $template = <<<HTML
<?php
  require_once("$easyCrudPath");

  class $className Extends Crud {

    # Your Table name
    protected \$table = '$tableName';

    # Primary Key of the Table
    protected \$pk	 = '$primaryKey';
  }

HTML;

  return $template;
}

function removeEmptyArray($var) {
  return !empty($var);
}

// $dataSettings = array(
//   "dbHost" => "localhost" ,
//   "dbUser" => "" ,
//   "dbPassword" => "" ,
//   "dbName" => "" ,
// );
//
// $dataIndex = array(
//   "className" => "Person"
// );
//
// $dataClass = array(
//   "easyCrudPath" => '../libs/easyCRUD.class.php' ,
//   "className" => 'Person',
//   "tableName" => 'Person',
//   "primaryKey" => 'id',
// );
//
// echo settingsTemplate($dataSettings)."\n";
// echo indexTemplate($dataIndex)."\n";
// echo classTemplate($dataClass)."\n";
