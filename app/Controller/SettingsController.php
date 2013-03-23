<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 */
class SettingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
	    $this->layout = 'admin';
		$this->Setting->recursive = 0;
		$this->set('settings', $this->paginate());
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
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
		$this->set('setting', $this->Setting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 /*
	public function add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if(!empty($this->request->data['Setting']['logo']))
             {
                 $logo =  $this->request->data['Setting']['logo'];
                 $filename = $logo['name'];
                 $ran = rand ();
                 if($filename != NULL) {
                     if(move_uploaded_file($logo['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                         $this->request->data['Setting']['logo'] = $ran.".".$logo['name'];
                     }
                     else
                     {
                         $this->request->data['Setting']['logo'] = null;
                     }
                 }
             }
             if(!empty($this->request->data['Setting']['backgroundImage']))
              {
                  $backgroundImage =  $this->request->data['Setting']['backgroundImage'];
                  $filename = $backgroundImage['name'];
                  $ran = rand ();
                  if($filename != NULL) {
                      if(move_uploaded_file($backgroundImage['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                          $this->request->data['Setting']['backgroundImage'] = $ran.".".$backgroundImage['name'];
                      }
                      else
                      {
                          $this->request->data['Setting']['backgroundImage'] = null;
                      }
                  }
              }
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
			}
		}
	}
	*/
	/**
     * install method
     *
     * @return void
     */
    	public function install() {
    	    if(sizeof($this->Setting->find('all'))==0)
    	    {
    		if ($this->request->is('post')) {
    			$this->Setting->create();
                if(!empty($this->request->data['Setting']['logo']))
                                 {
                                     $logo =  $this->request->data['Setting']['logo'];
                                     $filename = $logo['name'];
                                     $ran = rand ();
                                     if($filename != NULL) {
                                         if(move_uploaded_file($logo['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                                             $this->request->data['Setting']['logo'] = $ran.".".$logo['name'];
                                         }
                                         else
                                         {
                                             $this->request->data['Setting']['logo'] = null;
                                         }
                                     }
                                     else
                                     {
                                         $this->request->data['Setting']['logo'] = null;
                                     }
                                 }
                                 if(!empty($this->request->data['Setting']['backgroundImage']))
                                  {
                                      $backgroundImage =  $this->request->data['Setting']['backgroundImage'];
                                      $filename = $backgroundImage['name'];
                                      $ran = rand ();
                                      if($filename != NULL) {
                                          if(move_uploaded_file($backgroundImage['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                                              $this->request->data['Setting']['backgroundImage'] = $ran.".".$backgroundImage['name'];
                                          }
                                          else
                                          {
                                              $this->request->data['Setting']['backgroundImage'] = null;
                                          }
                                      }
                                      else
                                      {
                                          $this->request->data['Setting']['backgroundImage'] = null;
                                      }
                                  }
                if ($this->Setting->save($this->request->data)) {
                 $this->Session->setFlash(__('Application installed successfully.'),'success');
                 $this->redirect('/');
                } else {
                 $this->Session->setFlash(__('The setting could not be saved. Please, try again.'),'error');
                }
    		}
    		}
    		else {
				$this->Session->setFlash(__('Application is already installed.'),'warning');
				$this->redirect('/');
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
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		    $this->Setting->id = $id;
		    $oldLogo = $this->Setting->field('logo');
		    $oldBackgroundImage = $this->Setting->field('backgroundImage');
		    if(!empty($this->request->data['Setting']['logo']['name']))
             {
                 $logo =  $this->request->data['Setting']['logo'];
                 $filename = $logo['name'];
                 $ran = rand ();
                 if($filename != NULL) {
                     if(move_uploaded_file($logo['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                         $this->request->data['Setting']['logo'] = $ran.".".$logo['name'];
                         unlink('../../app/webroot/img/'.$oldLogo);
                     }
                     else
                     {
                         $this->request->data['Setting']['logo'] = null;
                     }
                 }
                 else
                 {
                     $this->request->data['Setting']['logo'] = null;
                 }
             }
             else
             {
                 unset($this->request->data['Setting']['logo']);
             }
             if(!empty($this->request->data['Setting']['backgroundImage']['name']))
              {
                  $backgroundImage =  $this->request->data['Setting']['backgroundImage'];
                  $filename = $backgroundImage['name'];
                  $ran = rand ();
                  if($filename != NULL) {
                      if(move_uploaded_file($backgroundImage['tmp_name'], '../../app/webroot/img/'.$ran.".".$filename)){
                          $this->request->data['Setting']['backgroundImage'] = $ran.".".$backgroundImage['name'];
                          unlink('../../app/webroot/img/'.$oldBackgroundImage);
                      }
                      else
                      {
                          $this->request->data['Setting']['backgroundImage'] = null;
                      }
                  }
                  else
                  {
                      $this->request->data['Setting']['backgroundImage'] = null;
                  }
              }
              else
              {
                  unset($this->request->data['Setting']['backgroundImage']);
              }
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved'),'success');
				$this->redirect('/');
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
		}
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
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Setting->delete()) {
			$this->Session->setFlash(__('Setting deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Setting was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function setLang($lg = null) {

		$this->Session->write('Lang', $lg);
		if($lg==1)
		{
		$this->Session->write('Config.language', 'tr');
		}
		else if ($lg==2)
		{
		$this->Session->write('Config.language', 'eng');
		}
		$this->redirect('/');
	}
}
