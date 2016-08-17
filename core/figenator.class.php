<?php

// TODO: include function
// TODO: figen class

require_once 'figenator.function.php';

/**
 * Figenator Class - PDO MySQL Generator
 */

class Figenator {

  public $easyCrudPath;
  public $generatedPath;

  public $tableName;
  public $className;
  public $primaryKey;

  public $dbHost;
  public $dbUser;
  public $dbPass;
  public $dbName;

  public $dataSettings;
  public $dataIndex;
  public $dataClass;

  function __construct() {
    $this->easyCrudPath  = '../libs/easyCRUD.class.php';
    $this->generatedPath = '/generated-files/';

    $this->dataSettings = array(
      "dbHost" => $this->dbHost ,
      "dbUser" => $this->dbUser ,
      "dbPassword" => $this->dbPass,
      "dbName" => $this->dbName ,
    );

    $this->dataIndex = array(
      "className" => $this->className
    );

    $this->dataClass = array(
      "easyCrudPath" => $this->easyCrudPath ,
      "className" => $this->className,
      "tableName" => $this->tableName,
      "primaryKey" => $this->primaryKey,
    );

    $this->dataSettings = array_filter($this->dataSettings, "removeEmptyArray");
    $this->dataIndex = array_filter($this->dataIndex, "removeEmptyArray");
    $this->dataClass = array_filter($this->dataClass, "removeEmptyArray");

    // print_r($this->dataIndex);
  }

  /**
   * Generate File
   * @param  [string] $name    filename
   * @param  [string] $content file content
   * @return [bool]          return true if file success created
   */

  public function createFile($name,$content) {
    // TODO: DIR
    $fp = fopen($this->dir . 'index.php', 'w');
    fwrite($fp, $content);
  }


  /**
   * Generate PDO MySQL
   * @return [type] [description]
   */
  public function generate() {
    $generatedPath = $this->generatedPath;
    $structure = dirname(__DIR__) . $generatedPath . $this->className . '/';

    if(!dir($structure)) {
      $old = umask(0);
      mkdir("$structure", 0777, TRUE);
      chmod("$structure", 0777);
      umask($old);
    }

    $index = indexTemplate();
    $class = classTemplate();

    // TODO: create func create file
    // TODO: create strcutre dir
    $fpIndex = fopen($structure . 'index.php', 'w');
    $fpClass = fopen($structure . $this->className .'.php', 'w');
    $fpSettings = fopen(dirname(__DIR__) .'/libs/settings.ini.php', 'w');

    fwrite($fpIndex, $index);
    fwrite($fpClass, $class);
    fwrite($fpSettings, $index);

    echo $structure;
    /**
     * make dir on generated-files named className
     * generate index.php
     * generate className.class.php  ?>
     * if libs folder not exists
       * copy and move libs file to className folder
       * create settings.ini.file
     * finish
     */
  }


}

/**
 * Test Class
 */

$figen = new figenator;

$figen->tableName = 'd';
$figen->className = 'ga';
$figen->primaryKey = 'id';

/**
 * Database Settings
 */

$figen->dbHost = 'localhost';
$figen->dbUser = 'root';
$figen->dbPass = '';
$figen->dbName = 'tes';

$figen->generate();

?>
