<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class OpenCartProductsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OpenCartProduct->recursive = 0;
		// $this->set('products', $this->paginate());
		var_dump(
		
			$this->OpenCartProduct->find('all', array(
				// 'conditions' => array('product_id' => 241),
				'recursive' => 3,
				'limit' => 1
			))
		
		);
	}
}
