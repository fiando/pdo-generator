<?php
	require_once("easyCRUD.class.php");

	class Person  Extends Crud {

			# Your Table name
			protected $table = 'education';

			# Primary Key of the Table
			protected $pk	 = 'id';
	}

?>
