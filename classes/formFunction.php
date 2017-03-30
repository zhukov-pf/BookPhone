<?php

/**
* 
*/

include_once("database.php");
include_once("config.php");

class formFunction {

	function addPhone() {
		new Database();
		if(isset($_POST['add'])) {
			$surname = $_POST['surname'];
			$name = $_POST['name'];
			$patronymic = $_POST['patronymic'];
			$company = $_POST['company'];
			$deportamnt = $_POST['deportamnt'];
			$position = $_POST['position'];
			$number = $_POST['number'];

			$query = mysql_query("INSERT INTO `contacts` (id,name,patronymic,surname,company,deportaments,position,number) VALUES (NULL,'$name','$patronymic','$surname','$company','$deportamnt','$position','$number')");
			echo mysql_error();
			if($query == TRUE) {
				printf('<br><pre class="bg-success">Новый контак успешно добавлен!</pre>');
			}
			else {
				printf('<pre class="bg-danger">Упс!... Что-то пошло не так!<br>'.mysql_error().'</pre>');
			}

		}

	}

	function editActionPhone(){
		new Database();

		if(isset($_POST['edit'])) {

			session_start();

			$_SESSION['userID'] = $_POST['edit'];

			header("Location: /edit.php");

		}

	}

	function editFormPhone(){

		new Database();

		session_start();

		if(isset($_SESSION['userID'])) {

			session_start();

			$uID = $_SESSION['userID'];

			$query1 = mysql_query("SELECT * FROM contacts WHERE id='$uID'");
			$row1 = mysql_fetch_object($query1);

			$query2 = mysql_query("SELECT name FROM company");
			$query3 = mysql_query("SELECT name FROM deportaments");
			$query4 = mysql_query("SELECT name FROM positions");

			printf('<input type="text" class="form-control" name="surname" value="'.$row1->surname.'" placeholder="Фамилия">');
			printf('<input type="text" class="form-control" name="name" value="'.$row1->name.'" placeholder="Имя">');
			printf('<input type="text" class="form-control" name="patronymic" value="'.$row1->patronymic.'" placeholder="Отчество">');

			printf('<select class="form-control" name="company">');
			printf('<option selected value="'.$row1->company.'">'.$row1->company.'</option>');
				while ($row2 = mysql_fetch_object($query2)) {
					printf('<option value="'.$row2->name.'">'.$row2->name.'</option>');
				}
			printf('</select>');

			printf('<select class="form-control" name="deportaments">');
			printf('<option selected  value="'.$row1->deportaments.'">'.$row1->deportaments.'</option>');
				while ($row3 = mysql_fetch_object($query3)) {
					printf('<option value="'.$row3->name.'">'.$row3->name.'</option>');
				}
			printf('</select>');

			printf('<select class="form-control" name="position">');
			printf('<option selected value="'.$row1->position.'">'.$row1->position.'</option>');
				while ($row4 = mysql_fetch_object($query4)) {
					printf('<option value="'.$row4->name.'">'.$row4->name.'</option>');
				}
			printf('</select>');
			printf('<input type="text" class="form-control" name="number" value="'.$row1->number.'" placeholder="Номер"><br>');
			printf('<input type="submit" class="btn btn-success" name="editForm" value="Внести изменеия"><br>');
			

			if(isset($_POST['editForm'])) {

				$surname = $_POST['surname'];
				$name = $_POST['name'];
				$patronymic = $_POST['patronymic'];
				$company = $_POST['company'];
				$deportaments = $_POST['deportaments'];
				$position = $_POST['position'];
				$number = $_POST['number'];

				$query = mysql_query("UPDATE `contacts` SET surname='$surname', name='$name', patronymic='$patronymic', company='$company', deportaments='$deportaments', position='$position', number='$number' WHERE id='$uID'");

				if($query == TRUE) {
					printf('<pre class="bg-success">Контакт успешно обнавлен!</pre>');
				}
				else {
					printf('<pre class="bg-danger">Упс!... Что-то пошло не так!<br>'.mysql_error().'</pre>');
				}

			}


		}
		else {
			printf('<pre class="bg-danger">Упс!... Что-то пошло не так!<br>Сессия не была создана!</pre>');
		}

	}

	function delPhone() {
		new Database();
		if(isset($_POST['del'])){

			$delID = $_POST['del'];

			$query = mysql_query("DELETE FROM `contacts` WHERE id='$delID'");

			if($query == TRUE) {

				$maxID = mysql_query("SELECT MAX(id) FROM `contacts`");

				$maxID = $maxID + 1;

				mysql_query("ALTER TABLE `contacts` AUTO_INCREMENT='$maxID';");

				printf('<pre class="bg-success">Контакт успешно удален!</pre>');

			}
			else {
				printf('<pre class="bg-danger">Упс!... Что-то пошло не так!<br>'.mysql_error().'</pre>');
			}

		}

	}

}