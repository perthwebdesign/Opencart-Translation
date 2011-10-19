<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartProductRelated extends AppModel {
	
	var $useTable = "product_option";
	
	var $belongsTo = array(
        'OpenCartProduct'
	);

}
