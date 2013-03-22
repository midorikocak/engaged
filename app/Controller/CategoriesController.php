<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

function flatten(array $array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
	    $this->layout = 'admin';
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
		//var_dump($this->Category->thr());
	}

    /**
     * index method
     *
     * @return void
     */
    	public function all() {
    		$this->Category->recursive = 1;
    		$categories = $this->Category->find('all', array('recursive'=>0,'fields'=>array('id'),'conditions'=>array('Category.parent_id'=>0)));
    		$this->set('topCategories',$this->flatten($categories));
    	}
    	
    	/**
         * index method
         *
         * @return void
         */
        	public function check() {
        		$this->Category->recursive = 1;
        		$categories = $this->Category->find('all', array('recursive'=>0,'fields'=>array('id'),'conditions'=>array('Category.parent_id'=>0)));
        		$this->set('topCategories',$this->flatten($categories));
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
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}
    
/**
 * show method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function show($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->Category->id = $id;
		
		// Querying top categories with children
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$category = $this->Category->find('first', $options);
		$allChildren = $this->flatten($this->Category->children($id,false,'id'));
		
		if($this->Category->field('parent_id')==0)
		{
		    // Find pins in the array of category id's
    		$pins = $this->Category->Pin->find('all', array(
                'conditions' => array(
                    "category_id" => $allChildren
                )
            ));
            foreach($pins as $pin)
            {
                $categoryTitle = $this->Category->find('first',array('recursive'=>0,'fields'=>'title','conditions'=>array('Category.id'=>$pin['Pin']['category_id'])));
                $pin['Pin']['categoryTitle']= $categoryTitle['Category']['title'];
                array_push($category['Pin'],$pin['Pin']);
            }
		}
		$this->set('category', $category);
		return $this->render();
	}

    /**
     * add method
     *
     * @return void
     */
    	public function add($parentCategoryId = null) {
    		if ($this->request->is('post')) {
    			$this->Category->create();
    			if($parentCategoryId!=null)
    			{
    				$this->request->data['Category']['parent_id'] = $parentCategoryId;
    			}
    			else
    			{
    				unset($this->request->data['Category']['parent_id']);
    			}

    			if ($this->Category->save($this->request->data)) {
    				$this->Session->setFlash(__('The category has been saved'),'success');
    				$this->redirect(array('action' => 'index'));
    			} else {
    				$this->Session->setFlash(__('The category could not be saved. Please, try again.'),'warning');
    			}
    		}
    		else
    		{
    		    $parents[0] = "[Top]";
    		    $categories = $this->Category->generateTreeList(null, null, null, ' - ');
    		    
                if($categories && !$parentCategoryId) {
                	foreach ($categories as $key=>$value)
                	$parents[$key] = $value;
                }
                else if($parentCategoryId)
                {
                	$onlyParent = $this->Category->read(null, $parentCategoryId);
                	$parents = null;
                	$parents[$parentCategoryId] = $onlyParent['Category']['title'];
                }
                $this->set(compact('parents'));
    		}
    		$statuses = $this->Category->Status->find('list');
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
    		$this->Category->id = $id;
    		if (!$this->Category->exists()) {
    			throw new NotFoundException(__('Invalid category'));
    		}
    		if ($this->request->is('post') || $this->request->is('put')) {
    			if ($this->Category->save($this->request->data)) {
    				$this->Session->setFlash(__('The category has been saved'),'success');
    				$this->redirect(array('action' => 'view',$id));
    			} else {
    				$this->Session->setFlash(__('The category could not be saved. Please, try again.'),'error');
    			}
    		} else {
    			$this->request->data = $this->Category->read(null, $id);
    			$parents[0] = "[Top]";
    		    $categories = $this->Category->generateTreeList(null, null, null, ' - ');
    		    
                if($categories) {
                	foreach ($categories as $key=>$value)
                	{
                	    // A category can't be it's own child
                	    if($id!=$key)
                	    {
                	    $parents[$key] = $value;
                	    }
                	}
                }
                $this->set(compact('parents'));
    		}
    		$statuses = $this->Category->Status->find('list');
    		$this->set(compact('parents', 'types', 'statuses'));
    	}

    	function actions($in = null)
    	{
    		$this->Category->id = $in;
    		$path = $this->Category->getPath($in);
    		$parent_id = $this->Category->field('parent_id');
    		$sectionName = $this->Category->find('list', array('conditions' => array('Category.id' => $parent_id),'fields'=>'title'));
    		$parent = $this->Category->find('list', array('conditions' => array('Category.parent_id' => $parent_id,'Category.parent_id NOT' => '0')));
    		$result = array('path'=>$path,'parent'=>$parent,'title'=>$sectionName);
    		$section = $sectionName;
    		$this->set(compact('path','parent','section'));
    		return $result;
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'),'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'),'warning');
		$this->redirect(array('action' => 'index'));
	}
}
