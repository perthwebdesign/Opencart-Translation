<?php
App::uses('AppModel', 'Model');
/**
 * Cat Model
 *
 */
class LegacyAllToolsCat extends AppModel {
	
	var $useTable = 'cats';
	var $tablePrefix = 'shop_';
	var $primaryKey = 'cat_id';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cat_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cat_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cat_display' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cat_display_order' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasAndBelongsToMany = array(
		'LegacyAllToolsProduct' => array(
			'className' => 'LegacyAllToolsProduct',
			'joinTable' => 'shop_products_to_cats',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'cat_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'LegacyAllToolsParentcat' => array(
			'className' => 'LegacyAllToolsParentcat',
			'joinTable' => 'shop_parents_to_cats',
			'foreignKey' => 'parent_id',
			'associationForeignKey' => 'cat_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
