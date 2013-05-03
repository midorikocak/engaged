<?php
App::uses('AppModel', 'Model');
/**
 * Setting Model
 *
 */
class Setting extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	
	public $validate = array(
            'title' => array(
                'alphaNumeric' => array(
                                'rule'     => 'alphaNumeric',
                                'required' => true,
                                'message'  => 'Alphabets and numbers only'
                            )
            )
            // ,
            // 'logo' => array(
            //     'rule'    => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
            //                         'filesize', '<=', '1MB',
            //                         'required' => false
            //                         ),
            //         'message' => 'Please supply a valid image.',
            //                                             'allowEmpty' => true
            // )
            // 'backgroundImage' => array(
            //     'rule'    => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
            //                         'filesize', '<=', '1MB',
            //                         'required' => false
            //                         ),
            //         'message' => 'Please supply a valid image.',
            //                                             'allowEmpty' => true
            // )
        );

    public function afterSave($created) {
       $this->_cacheNav();
    }

    public function afterDelete() {
       $this->_cacheNav();
    }

    public function _cacheNav() {
    $settings = $this->find('first');
    Cache::write('Settings', $settings, 'long');
    }
    
}
