<?php
// Require the person class file
   require("Person.class.php");

// Instantiate the person class
   $person  = new Person();

   $person->name = 'Multimedia';

// Create new person
   $person->Firstname = "Kona";
   $person->Age  = "20";
   $person->Sex = "F";
   $creation = $person->Create();

// Update Person Info
   $person->id = "4";
   $person->Age = "32";
   $saved = $person->Save();

// Find person
   $person->id = "4";
   $person->Find();

   d($person->Firstname, "Person->Firstname");
   d($person->Age, "Person->Age");

// Delete person
   $person->id = "17";
   $delete = $person->Delete();

 // Get all persons
   $persons = $person->all();

   // Aggregates methods
   d($person->max('year_end'), "Max person year_end");
   d($person->min('year_end'), "Min person year_end");
   d($person->sum('year_end'), "Sum persons year_end");
   d($person->avg('year_end'), "Average persons year_end");
   d($person->count('ideducation'), "Count persons");

   function d($v, $t = "")
   {
      echo '<pre>';
      echo '<h1>' . $t. '</h1>';
      var_dump($v);
      echo '</pre>';
   }

?>
