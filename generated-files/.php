<?php
  require_once("../libs/easyCRUD.class.php");

  class defaultClass Extends Crud {

    # Your Table name
    protected $table = 'defaultTable';

    # Primary Key of the Table
    protected $pk	 = 'id';
  }
