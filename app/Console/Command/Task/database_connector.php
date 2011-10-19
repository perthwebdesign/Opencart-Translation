<?php
	class DatabaseConnectorTask extends Shell {
	// var $uses = array('Model'); // same as controller var $uses
	    function execute($database=null, $dataSource="default") {
	    	
			$default = array(
				'driver' => 'mysql',
				'persistent' => false,
				'host' => '127.0.0.1',
				'login' => 'root',
				'password' => '',
				'database' => $database,
				'prefix' => '',
			);
			
			
			$internal = array(
				'driver' => 'mysql',
				'persistent' => false,
				'host' => '192.168.0.8',
				'login' => 'web_user',
				'password' => 'web_user',
				'database' => $database,
				'prefix' => '',
			);
			
			$intdev = array(
				'driver' => 'mysql',
				'persistent' => false,
				'host' => '192.168.0.10',
				'login' => 'dev_user',
				'password' => '5203456',
				'database' => $database,
				'prefix' => '',
			);
			
			
			//.. old VPS
			$oliver = array(
				'driver' => 'mysql',
				'persistent' => false,
				'host' => '203.31.191.80',
				'login' => 'dev_user',
				'password' => '5203456',
				'database' => $database,
				'prefix' => '',
			);
			
			//.. new VPS
			$web01 = array(
				'driver' => 'mysql',
				'persistent' => false,
				'host' => '202.81.217.2',
				'login' => 'dev_user',
				'password' => '5203456',
				'database' => $database,
				'prefix' => '',
			);
			
			$db =& ConnectionManager::getDataSource('default');
			$db->disconnect();
			$db->setConfig(${$dataSource});
			$db->connect();
		}
	}
?>
	    	