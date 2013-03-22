<?php
App::uses('AppController', 'Controller');
/**
 * Pins Controller
 *
 * @property Pin $Pin
 */
class PinsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
	    $this->layout ='admin';
		$this->Pin->recursive = 0;
		$this->set('pins', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	    $this->layout = 'admin';
		if (!$this->Pin->exists($id)) {
			throw new NotFoundException(__('Invalid pin'));
		}
		$options = array('conditions' => array('Pin.' . $this->Pin->primaryKey => $id));
		$this->set('pin', $this->Pin->find('first', $options));
	}

/**
 * search method
 *
 * @return void
 */
	public function search() {
		if (!$this->request->is('post')) {
			$this->request->data['Pin']['search'] = "";
		}
		$this->Pin->recursive = 2;
		$categories = $this->Pin->Category->find('list',
		array('fields' => array('id'), 'conditions'=>array('title LIKE' => '%'.$this->request->data['Pin']['search'].'%'))
		);
		$this->set('pins', $this->paginate(array(
             'OR'=>array(
                 'Pin.description LIKE' => '%'.$this->request->data['Pin']['search'].'%',
                 'Pin.title LIKE' => '%'.$this->request->data['Pin']['search'].'%',
                 'Pin.link LIKE' => '%'.$this->request->data['Pin']['search'].'%',
                 'Pin.category_id' => $categories
             )
			)));
	}

/**
 * add method
 *
 * @return void
 */
 public function add($id=null) {
     if ($this->request->is('post')) {
         $this->Pin->create();
         if(!empty($this->request->data['Pin']['picture']))
         {
             $picture =  $this->request->data['Pin']['picture'];
             $filename = $picture['name'];
             $ran = rand ();
             if($filename != NULL) {
                 if(move_uploaded_file($picture['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                     $this->request->data['Pin']['picture'] = $ran.".".$picture['name'];
                 }
                 else
                 {
                     $this->request->data['Pin']['picture'] = null;
                 }
             }
         }
         if(isset($id))
         {
             $this->request->data['Pin']['category_id'] = $id;
             $categories = $this->Pin->Category->find('list',array('conditions'=>array('Category.id'=>$id)));
         }
         if ($this->Pin->save($this->request->data)) {
                      $this->Session->setFlash(__('The pin has been saved'),'success');
                      $this->redirect('/');
                  } else {
                      $this->Session->setFlash(__('The pin could not be saved. Please, try again.'),'error');
                  }
     }
     if(isset($id))
     {
         $this->request->data['Pin']['category_id'] = $id;
         $categories = $this->Pin->Category->find('list',array('conditions'=>array('Category.id'=>$id)));
     }
     else
     {
        $categories = $this->Pin->Category->find('list');
     }
         $statuses = $this->Pin->Status->find('list');
         $this->set(compact('categories', 'statuses'));
     }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pin->exists($id)) {
			throw new NotFoundException(__('Invalid pin'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		    $this->Pin->id = $id;
    		$oldPicture = $this->Pin->field('picture');
		    if(!empty($this->request->data['Pin']['picture']['name']))
             {
                 $picture =  $this->request->data['Pin']['picture'];
                 $filename = $picture['name'];
                 $ran = rand ();
                 if($filename != NULL) {
                     if(move_uploaded_file($picture['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                         unlink('../../app/webroot/img/'.$oldPicture);
                         $this->request->data['Pin']['picture'] = $ran.".".$picture['name'];
                     }
                     else
                     {
                         $this->request->data['Pin']['picture'] = null;
                     }
                 }
             }
             else
             {
                 unset($this->request->data['Pin']['picture']);
             }
			if ($this->Pin->save($this->request->data)) {
				$this->Session->setFlash(__('The pin has been saved'),'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pin could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Pin.' . $this->Pin->primaryKey => $id));
			$this->request->data = $this->Pin->find('first', $options);
		}
		$categories = $this->Pin->Category->find('list');
		$statuses = $this->Pin->Status->find('list');
		$this->set(compact('categories', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pin->id = $id;
		if (!$this->Pin->exists()) {
			throw new NotFoundException(__('Invalid pin'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pin->delete()) {
			$this->Session->setFlash(__('Pin deleted'),'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pin was not deleted'),'warning');
		$this->redirect(array('action' => 'index'));
	}
}
