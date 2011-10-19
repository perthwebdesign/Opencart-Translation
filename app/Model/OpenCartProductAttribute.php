<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartProductAttribute extends AppModel {
	
	var $useTable = "product_attribute";
	// var $tablePrefix = 'oc_';
	var $primaryKey = 'product_id';
	
	var $belongsTo = array(
        'OpenCartProduct'
	);

}
