<?php


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
  }

  private function setDataIndex() {
    $this->dataIndex = array(
      "className" => $this->className
    );

    return $this->dataIndex = array_filter($this->dataIndex, "removeEmptyArray");
  }

  private function setDataSettings() {
    $this->dataSettings = array(
      "dbHost" => $this->dbHost ,
      "dbUser" => $this->dbUser ,
      "dbPassword" => $this->dbPass,
      "dbName" => $this->dbName ,
    );

    return $this->dataSettings = array_filter($this->dataSettings, "removeEmptyArray");
  }

  private function setDataClass() {
    $this->dataClass = array(
      "easyCrudPath" => $this->easyCrudPath ,
      "className" => $this->className,
      "tableName" => $this->tableName,
      "primaryKey" => $this->primaryKey,
    );

    return $this->dataClass = array_filter($this->dataClass, "removeEmptyArray");
  }

  public function getDir($name = '') {
    $dir = dirname(__DIR__) . $this->generatedPath . $name;
    return $dir;
  }

  /**
   * Generate File
   * @param  [string] $name    filename
   * @param  [string] $content file content
   * @return [bool]          return true if file success created
   */

  private function createFile($name,$content,$path = '') {
    $dir = $this->getDir();
    $fp = fopen($dir . $path . '/' . $name . '.php', 'w');
    return fwrite($fp, $content);
  }

  private function createDir($path = '') {
    $dir = $this->getDir();
    $dir = $dir . $path;
    $old = umask(0);
    if (!file_exists($dir) && mkdir($dir, 0777, TRUE)) {
      chmod($dir, 0777) or die('Change Dir Permission Fail');
      return true;
    }
    umask($old);
    return false;

  }

  public function generateLibs() {
    $dir = $this->getDir('libs/');
    $libs_dir = dirname(__DIR__) . '/libs/';

    $this->createDir('libs');

    if (file_exists($libs_dir) && file_exists($dir)) {
      copy($libs_dir . 'Db.class.php' , $dir.'Db.class.php' );
      copy($libs_dir . 'easyCRUD.class.php' , $dir . 'easyCRUD.class.php');
      copy($libs_dir . 'Log.class.php' , $dir . 'Log.class.php' );
      // copy($libs_dir . 'settings.ini.php' , $dir . 'settings.ini.php');
      return true;
    }

    return false;
  }
  /**
   * Generate PDO MySQL
   * @return [type] [description]
   */
  public function generate() {
    $dir = $this->getDir();

    $this->createDir($this->className);

    //Set Template Variable

    $this->setDataSettings();
    $this->setDataIndex();
    $this->setDataClass();

    $indexTemplate = indexTemplate($this->dataIndex);
    $classTemplate = classTemplate($this->dataClass);
    $settingsTemplate = settingsTemplate($this->dataSettings);

    //Generate Class, Index, Settings File
    $this->createFile($this->className,$classTemplate, $this->className);
    $this->createFile('index',$indexTemplate, $this->className);
    $this->createFile('settings.ini', $settingsTemplate, 'libs');

    if (!file_exists($this->getDir('libs'))) {
      $this->generateLibs();
    }

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

?>
