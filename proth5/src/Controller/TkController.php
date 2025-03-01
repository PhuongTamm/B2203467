<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tk Controller
 *
 * @property \App\Model\Table\TkTable $Tk
 */
class TkController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Tk->find()
            ->contain(['Students'])
            ->order(['cumulative_score' => 'DESC']);
        $tk = $this->paginate($query);

        $this->set(compact('tk'));
    }

    /**
     * View method
     *
     * @param string|null $id Tk id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tk = $this->Tk->get($id, contain: ['Students']);
        $this->set(compact('tk'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tk = $this->Tk->newEmptyEntity();
        if ($this->request->is('post')) {
            $tk = $this->Tk->patchEntity($tk, $this->request->getData());
            if ($this->Tk->save($tk)) {
                $this->Flash->success(__('The tk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tk could not be saved. Please, try again.'));
        }
        $students = $this->Tk->Students->find('list', limit: 200)->all();
        $this->set(compact('tk', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tk id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tk = $this->Tk->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tk = $this->Tk->patchEntity($tk, $this->request->getData());
            if ($this->Tk->save($tk)) {
                $this->Flash->success(__('The tk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tk could not be saved. Please, try again.'));
        }
        $students = $this->Tk->Students->find('list', limit: 200)->all();
        $this->set(compact('tk', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tk = $this->Tk->get($id);
        if ($this->Tk->delete($tk)) {
            $this->Flash->success(__('The tk has been deleted.'));
        } else {
            $this->Flash->error(__('The tk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
