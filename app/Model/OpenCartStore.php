<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartStore extends AppModel {
	
	var $useTable = "store";
	// var $tablePrefix = 'oc_';
	var $primaryKey = 'store_id';
	
	// var $belongsTo = array(
        // 'OpenCartProduct'
	// );

}
