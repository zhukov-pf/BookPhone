<?php

/**
* 
*/

class Database {
	
	function __construct() {
	
		define(HOST, 'localhost');
		define(USER, 'phone');
		define(PASS, 'phone');
		define(NAME, 'phone');

		if(mysql_connect(HOST, USER, PASS) == TRUE) {
			if(mysql_select_db(NAME) == TRUE) {
				mysql_set_charset("utf8");
			}
			else {
				printf('<pre class="bg-danger">Ошибка выбора базы данных: '.NAME.'!<br>Обратитесь к системному администратору.</pre>');
			}
		}
		else {
			printf('<pre class="bg-danger">Ошибка подключения к серверу базы данных: '.HOST.'!<br>Обратитесь к системному администратору.</pre>');
		}

	}

}

?>