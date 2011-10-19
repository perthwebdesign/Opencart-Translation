<?php

	/**
	 * 
	 */
	class MigrateShell extends AppShell {
		
		
		var $uses = array();
		
		var $newTables = array(
			'OpenCartProduct',
			'OpenCartStore'
		);
		
		var $legacyTables = array(
			'LegacyAllToolsProduct',
			'LegacyAllToolsCat',
			'LegacyAllToolsManufacturer',
			'LegacyAllToolsAttribute',
			'LegacyAllToolsParentcat',
		);
		
		
		var $TranslateTo = "";
		var $TranslateFrom = "";
		var $TranslationsConfig = "";
		
		var $BatchSelectAmount = 10;
		
		function __construct() {
			$this->uses = array_merge($this->newTables, $this->legacyTables);
			parent::__construct();
			
			//.. Include The Connection Manager.
			App::uses('ConnectionManager', 'Model');
			
			//.. Create a new ON-THE-FLY datasource connection.
			ConnectionManager::create('legacy',
				array(
					'datasource' => 'Database/Mysql',
					'persistent' => false,
					'host' => '127.0.0.1',
					'login' => 'root',
					'password' => '',
					'database' => 'alltools',
					'prefix' => '',
				)
			);
		}
		
		function runMigration() {
			
			//.. Handle a seperate database connection for legacy products.
			ConnectionManager::create('legacy',
				array(
					'datasource' => 'Database/Mysql',
					'persistent' => false,
					'host' => '127.0.0.1',
					'login' => 'root',
					'password' => '',
					'database' => 'alltools',
					'prefix' => '',
				)
			);
			
			
			foreach($this->legacyTables as $legacyTable) {
				$this->{$legacyTable}->useDbConfig = 'legacy';	
			}
			
			$LegacyProducts = $this->LegacyAllToolsProduct->find('all', array(
				'recursive' => 1,
				'limit' => $this->BatchSelectAmount
			));
			
			
			
			// var_dump(array_keys($this->TranslationsConfig[$this->TranslateTo]));
			
			//.. Translate each object EG Product
			foreach( $this->TranslationsConfig[$this->TranslateTo] as $Object => $Models ) {
				
				$this->out("Translating $Object");
				$this->out("===============================");
				
				//.. Loop through all models that make up the object
				foreach( $Models as $ModelName => $Model ) {
					//.. Prep each model that make up the {$Object} (translate from)
					foreach( $Model[$this->TranslateFrom] as $ColumnName => $ColumnInformation ) {
						
						if( is_array( $ColumnInformation ) ) {
							$LegacyTranslationObjects = $this->{$ColumnInformation['model']}->find('all', array(
								'recursive' => 1,
								'limit' => $this->BatchSelectAmount
							));
							
							foreach( $LegacyTranslationObjects as $LegacyTranslationObject ) {
								echo "test";
								$NewTranslation[$ModelName][$ColumnName] = $LegacyTranslationObject[$ColumnInformation['model']][$ColumnInformation['column']];
							
							}
							
							var_dump($NewTranslation);
							
						}
						
						// var_dump($ColumnInformation);
						// return;
// 						
						// if( preg_match('/^STRING::/', $ColumnMapping)  ) {
							// $NewTranslation[$Model][$ColumnName] = $ColumnMapping;
						// } elseif( is_integer( $ColumnMapping ) ) {
							// $NewTranslation[$Model][$ColumnName] = $ColumnMapping;
						// } elseif( @!is_null( $ColumnMapping ) ) { 
// 
// 							
							// $Mapping = $this->ParseMapping($ColumnMapping);
// 							
							// $LegacyObject = $this->{$Mapping[0]}->find('all',array(
								// 'recursive' => 1,
								// 'limit' => $this->BatchSelectAmount
							// ));
// 
							// // $Value = $this->TraverseArray(
								// // $LegacyProduct,
								// // $this->ParseMapping($ColumnMapping)
							// // );
// 								
							// var_dump($LegacyObject);
// 							
// 							
							// $NewTranslation[$Model][$ColumnName] = $Value;
// 							
						// } else {
							// $NewTranslation[$Model][$ColumnName] = "";
						// }
// 						
// 						
// 						
						// var_dump($NewTranslation);
						// die("test");
						
					}

				// var_dump($NewTranslation);

				}
			}
			
			
			return;
			
			foreach( $this->TranslationsConfig[$this->TranslateTo][$this->TranslateFrom] as $Model => $Columns ) {
			
				var_dump( $Model, $Columns);	
				
			}
			
			
			
			return;
			
			
			//.. For all Legacy products returned, run through the translation rules.
			foreach( $LegacyProducts as $LegacyProduct ) {
				
				$NewTranslation = array();
			
				//.. Loop through all translation options "Models"
				foreach( $this->TranslationsConfig[$this->TranslateTo][$this->TranslateFrom] as $Model => $Columns ) {
					
					foreach( $Columns as $ColumnName => $ColumnMapping ) {
						
						
						var_dump($LegacyProduct);
						
						var_dump($ColumnMapping);
						
						if( preg_match('/^STRING::/', $ColumnMapping)  ) {
							$NewTranslation[$Model][$ColumnName] = $ColumnMapping;
						} elseif( is_integer( $ColumnMapping ) ) {
							$NewTranslation[$Model][$ColumnName] = $ColumnMapping;
						} elseif( @!is_null( $ColumnMapping ) ) { 

								$Value = $this->TraverseArray(
									$LegacyProduct,
									$this->ParseMapping($ColumnMapping)
								);
								
								var_dump($Value);
								
								
								$NewTranslation[$Model][$ColumnName] = $Value;
							
						} else {
							$NewTranslation[$Model][$ColumnName] = "";
						}
						
					}
					
					die("test");
				};
				
				
				// if($Model == "OpenCartCategory") {
					// var_dump($LegacyProduct,$NewTranslation);
				// }
				
				//.. Insert Record.
				// $this->OpenCartProduct->saveAll($NewTranslation);
			}
			
			return;
		}


		function DataTranslate() {
			
			//.. Read translations from the translation.php config file.
			$this->TranslationsConfig = Configure::read('Translations'); 
			
			//.. Grab the available destination options
			$TranslationToOptions = array_keys($this->TranslationsConfig);
			
			//.. Prompt the user for a destination
			// $this->TranslateTo = $this->_getInput("Select a DESTINATION translation", $TranslationToOptions, $TranslationToOptions[0]);
			$this->TranslateTo = "OpenCart";

			//.. Grab the available source options			
			$TranslateFromOptions = array_keys($this->TranslationsConfig[$this->TranslateTo]);
			
			//.. Prompt the user for a source
			// $this->TranslateFrom = $this->_getInput("Select a SOURCE translation", $TranslateFromOptions, $TranslateFromOptions[0]);
			
			$this->TranslateFrom = "LegacyAllTools";
			
			//.. Let the user know what's going on
			$this->out("Translating from $this->TranslateFrom to $this->TranslateTo");
			$this->out("===========================================================");

			//.. Actually to the migration
			$this->runMigration();

			return;
		}
		
		
		/**
		* Sets an element of a multidimensional array from an array containing
		* the keys for each dimension.
		* 
		* @param array &$array The array to manipulate
		* @param array $path An array containing keys for each dimension
		*/
		private function TraverseArray( $array, $path, $Value=null ) {
			
			$key = array_shift($path);
			
			if (empty($path)) {
				return $array[$key];
			} else {
				if (!isset($array[$key]) || !is_array($array[$key])) {
					$array[$key] = array();
				}
				$Callback = $this->TraverseArray($array[$key], $path);
			}
			
			return $Callback;
		}
		
		private function ParseMapping( $String ) {
			
			if( is_null( $String ) ) {
				return NULL;
			} else {
				$StringArray = explode(".", $String);
				
				return $StringArray;
			}
		}		
		
		
		function GenerateCategories() {
			
			foreach($this->legacyTables as $legacyTable) {
				$this->{$legacyTable}->useDbConfig = 'legacy';	
			}
			
			var_dump(
				$this->LegacyAllToolsParentcat->find('all')
			);
			
		}
		
		
		
		
	}
	


?>