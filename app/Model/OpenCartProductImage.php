<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class OpenCartProductImage extends AppModel {
	
	var $useTable = "product_image";
	
	var $belongsTo = array(
        'OpenCartProduct'
	);

}
