generate-semesters
==================

Generate Semesters is a PHP class for generating semester names such as "Fall 2013", "Spring 2012" and so on.

Usage:
Just like any class, you need to include it, create a new instance than call the appropriate function.

<?php
  include("class.semesters.php");
  $generateSemesters = new Semesters;
  $generateSemesters->getSemesters();
?>

Functions:
getSemesters - generates an array of the next 3 semesters. You can pass in a number to get a specific number of semesters (up to 3). -1 (negative one) will output 3 semesters offset one semester ahead.

outputSelectHTML - generates the semester names wrapped in an <option> tag that you drop right into a <select> tag.
