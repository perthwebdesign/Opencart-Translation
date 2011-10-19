<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class LegacyAllToolsProductsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LegacyAllToolsProduct->recursive = 0;
		// $this->set('products', $this->paginate());
		var_dump(
		
			$this->LegacyAllToolsProduct->find('all', array(
				// 'conditions' => array('product_id' => 241),
				'recursive' => 3,
				'limit' => 1
			))
		
		);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->LegacyAllToolsProduct->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->LegacyAllToolsProduct->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LegacyAllToolsProduct->create();
			if ($this->LegacyAllToolsProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$products = $this->Product->Product->find('list');
		$attributesTos = $this->Product->AttributesTo->find('list');
		$toAddons = $this->Product->ToAddon->find('list');
		$toCats = $this->Product->ToCat->find('list');
		$toManufacturers = $this->Product->ToManufacturer->find('list');
		$this->set(compact('products', 'attributesTos', 'toAddons', 'toCats', 'toManufacturers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}
		$products = $this->Product->Product->find('list');
		$attributesTos = $this->Product->AttributesTo->find('list');
		$toAddons = $this->Product->ToAddon->find('list');
		$toCats = $this->Product->ToCat->find('list');
		$toManufacturers = $this->Product->ToManufacturer->find('list');
		$this->set(compact('products', 'attributesTos', 'toAddons', 'toCats', 'toManufacturers'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
