<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartProductOption extends AppModel {
	
	var $useTable = "product_option";
	
	var $belongsTo = array(
        'OpenCartProduct'
	);

}
