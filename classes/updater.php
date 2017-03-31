<?php

/**
* 
*/


class Updater {
	
	function __construct() {
		
		exec("cd /var/www/phone");
		exec("git clone https://github.com/zhukov-pf/BookPhone.git ./");
		exec("git remote update");
		exec("git checkout Updates");
		exec("git merge Updates");

	}
}