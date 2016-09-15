<?php
App::uses('AppController', 'Controller');
/**
 * Journals Controller
 *
 * @property Journal $Journal
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class JournalsController extends AppController {

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
		$this->Journal->recursive = 0;
		$this->set('journals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Journal->exists($id)) {
			throw new NotFoundException(__('Invalid journal'));
		}
		$options = array('conditions' => array('Journal.' . $this->Journal->primaryKey => $id));
		$this->set('journal', $this->Journal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Journal->create();
            $previousBalance = $this->Journal->getPreviousBalance($this->request->data['Journal']['date']);
            $newBalance = $previousBalance
                + $this->request->data['Journal']['deposit']
                - $this->request->data['Journal']['payment'];
            $this->request->data['Journal']['balance'] = $newBalance;

            $result = $this->Journal->save($this->request->data);
            if ($result) {
                // if the new rew record saved successfully, update the balance in all of newer records
                $this->Journal->updateNewBalance($result['Journal']['date']);

                $this->Flash->success(__('The journal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The journal could not be saved. Please, try again.'));
			}
		}
		$usages = $this->Journal->Usage->find('list');
		$this->set(compact('usages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Journal->exists($id)) {
			throw new NotFoundException(__('Invalid journal'));
		}
		if ($this->request->is(array('post', 'put'))) {
		    // get the date before edit
            $previousBalance = $this->Journal->getPreviousBalance(
                $this->request->data['Journal']['date']
            );
            $newBalance = $previousBalance
                + $this->request->data['Journal']['deposit']
                - $this->request->data['Journal']['payment'];
            $this->request->data['Journal']['balance'] = $newBalance;
		    $result = $this->Journal->update($this->request->data);
			if ($result) {
				$this->Flash->success(__('The journal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The journal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Journal.' . $this->Journal->primaryKey => $id));
			$this->request->data = $this->Journal->find('first', $options);
		}
		$usages = $this->Journal->Usage->find('list');
		$this->set(compact('usages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Journal->id = $id;
		if (!$this->Journal->exists()) {
			throw new NotFoundException(__('Invalid journal'));
		}
        //$this->log($this->Journal, 'debug');
		$this->request->allowMethod('post', 'delete');
        $result = $this->Journal->delete();
		if ($result) {
            //$this->log($result, 'debug');
			$this->Flash->success(__('The journal has been deleted.'));
		} else {
			$this->Flash->error(__('The journal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
