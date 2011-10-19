<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartProduct extends AppModel {
	
	var $useTable = "product";
	// var $tablePrefix = 'oc_';
	var $primaryKey = 'product_id';
	
	var $hasMany = array(
	    'OpenCartProductAttribute',
        'OpenCartProductDescription',
        'OpenCartProductDiscount',
        'OpenCartProductImage',
        'OpenCartProductOption',
        
	);
	
	var $hasAndBelongsToMany = array(
		'OpenCartStore' => array(
			'className' => 'OpenCartStore',
			'joinTable' => 'product_to_store',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'store_id'
		),
		'OpenCartCategory' => array(
			'className' => 'OpenCartCategory',
			'joinTable' => 'product_to_category',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'category_id'
		),
	);

}
