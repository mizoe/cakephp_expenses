<?php
App::uses('AppController', 'Controller');
/**
 * Usages Controller
 *
 * @property Usage $Usage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Usage->recursive = 0;
		$this->set('usages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Usage->exists($id)) {
			throw new NotFoundException(__('Invalid usage'));
		}
		$options = array('conditions' => array('Usage.' . $this->Usage->primaryKey => $id));
		$this->set('usage', $this->Usage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usage->create();
			if ($this->Usage->save($this->request->data)) {
				$this->Flash->success(__('The usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The usage could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Usage->exists($id)) {
			throw new NotFoundException(__('Invalid usage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usage->save($this->request->data)) {
				$this->Flash->success(__('The usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The usage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usage.' . $this->Usage->primaryKey => $id));
			$this->request->data = $this->Usage->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Usage->id = $id;
		if (!$this->Usage->exists()) {
			throw new NotFoundException(__('Invalid usage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Usage->delete()) {
			$this->Flash->success(__('The usage has been deleted.'));
		} else {
			$this->Flash->error(__('The usage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
