<?php
	require_once("../libs/easyCRUD.class.php");

	class Person  Extends Crud {

			# Your Table name
			protected $table = 'person';

			# Primary Key of the Table
			protected $pk	 = 'id';
	}
