<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array('DebugKit.Toolbar','Session','RequestHandler', 'Authake.Authake');
    var $helpers = array('Form', 'Time', 'Html', 'Session', 'Js', 'Authake.Authake','Word');
    
    function beforeFilter(){
        $this->auth();
        Cache::set(array('duration' => '+1 year'));
        $settings = Cache::read("Settings","long");
        
        Configure::write('Config.language', 'eng');
        setlocale("LC_ALL", "en_EN.utf8");
        
        if(empty($settings) && $this->params['action']!='install' && $this->params['action']!='setLang')
        {
            $this->redirect(array('controller'=>'settings','action' => 'install'));
        }
    }
    private function auth(){
        Configure::write('Authake.useDefaultLayout', true);
        $this->Authake->beforeFilter($this);
    }
    
}
