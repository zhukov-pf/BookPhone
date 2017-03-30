<?php

/**
* 
*/

include_once("database.php");

class formGen {

	function genCompany() {
		new Database();

		$query = mysql_query("SELECT name FROM company");
		
		while ($row = mysql_fetch_object($query)) {
			printf('<option value="'.$row->name.'">'.$row->name.'</option>');
		}
	}

	function genDeportament() {
		new Database();

		$query = mysql_query("SELECT name FROM deportaments");
		
		while ($row = mysql_fetch_object($query)) {
			printf('<option value="'.$row->name.'">'.$row->name.'</option>');
		}
	}

	function genPosition() {
		new Database();

		$query = mysql_query("SELECT name FROM positions");
		
		while ($row = mysql_fetch_object($query)) {
			printf('<option value="'.$row->name.'">'.$row->name.'</option>');
		}
	}

}