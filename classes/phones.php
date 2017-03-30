<?php

/**
* 
*/

include_once("database.php");
include_once("config.php");

class Phones {
	
	function __construct() {
	
		new Database();

		$u_ip = $_SERVER['REMOTE_ADDR'];

		$query = mysql_query("SELECT * FROM access WHERE host='$u_ip'");
		$res = mysql_fetch_array($query);

		if($u_ip =+ $res['host']) {
			printf('<thead>');
			printf('<tr>');
			printf('<th><lavel>#</label></th>');
			printf('<th><label>Фамилия</label></th>');
			printf('<th><label>Имя</label></th>');
			printf('<th><label>Отчество</label></th>');
			printf('<th><label>Компания</label></th>');
			printf('<th><label>Отдел</label></th>');
			printf('<th><label>Должность</label></th>');
			printf('<th><label>Телефон</label></th>');
			printf('<th class="nosort"><label>Редактировать</label></th>');
			printf('<th class="nosort"><label>Удалить</label></th>');
			printf('</tr>');
			printf('</thead>');
			printf('<tbody>');

			$quety = mysql_query("SELECT * FROM contacts");

			while ($row = mysql_fetch_object($quety)) {
				printf('<tr>');
				printf('<td>'.$row->id.'</td>');
				printf('<td>'.$row->surname.'</td>');
				printf('<td>'.$row->name.'</td>');
				printf('<td>'.$row->patronymic.'</td>');
				printf('<td>'.$row->company.'</td>');
				printf('<td>'.$row->deportaments.'</td>');
				printf('<td>'.$row->position.'</td>');
				printf('<td>'.$row->number.'</td>');
				printf('<td><input type="submit" name="edit" value="'.$row->id.'" class="btn btn-sm btn-warning"></td>');
				printf('<td><input type="submit" name="del" value="'.$row->id.'" class="btn btn-sm btn-danger"></td>');
				printf('</tr>');
			}
		}
		else {

			printf('<thead>');
			printf('<tr>');
			printf('<th><lavel>#</label></th>');
			printf('<th><label>Фамилия</label></th>');
			printf('<th><label>Имя</label></th>');
			printf('<th><label>Отчество</label></th>');
			printf('<th><label>Компания</label></th>');
			printf('<th><label>Отдел</label></th>');
			printf('<th><label>Должность</label></th>');
			printf('<th><label>Телефон</label></th>');
			printf('</tr>');
			printf('</thead>');
			printf('<tbody>');

			$quety = mysql_query("SELECT * FROM contacts");

			while ($row = mysql_fetch_object($quety)) {
				printf('<tr>');
				printf('<td>'.$row->id.'</td>');
				printf('<td>'.$row->surname.'</td>');
				printf('<td>'.$row->name.'</td>');
				printf('<td>'.$row->patronymic.'</td>');
				printf('<td>'.$row->company.'</td>');
				printf('<td>'.$row->deportaments.'</td>');
				printf('<td>'.$row->position.'</td>');
				printf('<td>'.$row->number.'</td>');
				printf('</tr>');
			}

			printf('</tbody>');

		}

	}

	function addMenu() {

		new Database();

		$u_ip = $_SERVER['REMOTE_ADDR'];

		$query = mysql_query("SELECT * FROM access WHERE host='$u_ip'");
		$res = mysql_fetch_array($query);

		if($u_ip == $res['host']) {

			printf('<a href="/add.php">Добавить</a>');

		}

	}

}