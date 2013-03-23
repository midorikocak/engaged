<?php
App::uses('AppModel', 'Model');
/**
 * Pin Model
 *
 * @property Category $Category
 * @property Status $Status
 */
class Pin extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	
    // public $validate = array(
    //             'title' => array(
    //                 'alphaNumeric' => array(
    //                                 'rule'     => 'alphaNumeric',
    //                                 'required' => true,
    //                                 'message'  => 'Alphabets and numbers only'
    //                             )
    //             ),
    //             'picture' => array(
    //                 'rule'    => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
    //                                     'filesize', '<=', '1MB'
    //                                     ),
    //                     'message' => 'Please supply a valid image.'
    //             )
    //         );


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'Authake.User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
