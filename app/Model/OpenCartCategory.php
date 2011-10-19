<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartCategory extends AppModel {
	
	var $useTable = "category";
	// var $tablePrefix = 'oc_';
	var $primaryKey = 'category_id';
	
	// var $belongsTo = array(
        // 'OpenCartProduct'
	// );

}
