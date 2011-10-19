<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartProductDescription extends AppModel {
	
	var $useTable = "product_description";
	
	var $belongsTo = array(
        'OpenCartProduct'
	);

}
