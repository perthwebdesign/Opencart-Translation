<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartProductDiscount extends AppModel {
	
	var $useTable = "product_discount";
	
	var $belongsTo = array(
        'OpenCartProduct'
	);

}
