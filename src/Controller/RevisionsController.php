<?php

namespace Revisions\Controller;

use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Revisions\Controller\AppController;

/**
 * Revisions Controller
 *
 * @property \Revisions\Model\Table\RevisionsTable $Revisions
 */
class RevisionsController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->loadComponent('Flash');
	}

	/**
	 * Index method
	 *
	 * @return void
	 */
	public function index() {
		$this->set('revisions', $this->paginate($this->Revisions));
		$this->set('_serialize', ['revisions']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Revision id.
	 * @return void
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function view($id = null) {
		$revision = $this->Revisions->get($id, [
		]);
		$this->set('revision', $revision);
		$this->set('_serialize', ['revision']);

		$model = TableRegistry::get($revision->model);

		$before = $model->newEntity($revision->before_edit, ['accessibleFields' => ['*' => true]]);
		$before->clean();

		$after = $model->patchEntity(clone $before, $revision->after_edit, ['accessibleFields' => ['*' => true]]);

		$diff = array_diff($after->jsonSerialize(), $before->jsonSerialize());

		$this->set(compact('before', 'after', 'diff'));
	}

	// /**
	//  * Add method
	//  *
	//  * @return void Redirects on successful add, renders view otherwise.
	//  */
	// public function add()
	// {
	//     $revision = $this->Revisions->newEntity();
	//     if ($this->request->is('post')) {
	//         $revision = $this->Revisions->patchEntity($revision, $this->request->data);
	//         if ($this->Revisions->save($revision)) {
	//             $this->Flash->success(__('The revision has been saved.'));
	//             return $this->redirect(['action' => 'index']);
	//         } else {
	//             $this->Flash->error(__('The revision could not be saved. Please, try again.'));
	//         }
	//     }
	//     $this->set(compact('revision'));
	//     $this->set('_serialize', ['revision']);
	// }

	/**
	 * Edit method
	 *
	 * @param string|null $id Revision id.
	 * @return void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$revision = $this->Revisions->get($id, [
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$revision = $this->Revisions->patchEntity($revision, $this->request->data);
			if ($this->Revisions->save($revision)) {
				$this->Flash->success(__('The revision has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The revision could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('revision'));
		$this->set('_serialize', ['revision']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Revision id.
	 * @return void Redirects to index.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$revision = $this->Revisions->get($id);
		if ($this->Revisions->delete($revision)) {
			$this->Flash->success(__('The revision has been deleted.'));
		} else {
			$this->Flash->error(__('The revision could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

	public function element_index($id = null, $limit = 0, $model = 0) {
		$this->layout = false;
		$conditions = [
			'Revisions.modelPrimaryKey' => $id
		];
		if(!empty($model)){
			$conditions['Revisions.model'] = $model;
		}
		$revisions = $this->Revisions->find()
				->where($conditions)
				->order(['created' => 'DESC']);
		if(!empty($limit)){
			$revisions->limit($limit);
		}
		$this->set('revisions', $revisions->toArray());
	}

	public function element_compare($idA, $idB) {
		$this->layout = false;
		$revisionA = $this->Revisions->find()
				->where(['Revisions.id' => $idA])
				->first();
		$revisionB = $this->Revisions->find()
				->where(['Revisions.id' => $idB])
				->first();
		$this->set(compact('revisionA', 'revisionB'));
	}

	public function element_restore($id, $dir = "before") {
		$this->layout = false;
		$revision = $this->Revisions->get($id);
		$table = TableRegistry::get($revision->model);
		$old_entity = $table->get($revision->modelPrimaryKey);
		$new_entity = $table->patchEntity($old_entity, $dir == "before" ? $revision->before_edit : $revision->after_edit);
		if ($table->save($new_entity)) {
			$this->Flash->success('Successfully edited.');
		} else {
			$this->Flash->error('The revision could not be reverted.');
		}
	}

}
