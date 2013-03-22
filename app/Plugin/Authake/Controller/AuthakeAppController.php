<?php
/*
	This file is part of Authake.

	Author: Jérôme Combaz (jakecake/velay.greta.fr)
	Contributors: Mutlu Tevfik Kocak (mtkocak.net)

	Authake is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	Authake is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
App::uses('AppController', 'Controller');
//App::uses('PagesController', 'Controller');
class AuthakeAppController extends AppController {
	var $helpers = array('Time', 'Authake.Htmlbis');
	function __makePassword($password1, $password2) {

		if ($password1 != $password2)
		{
			$this->Session->setFlash(__('The two passwords do not match!'), 'error');
			return false;
		}

		return md5($password1);
	}

	function beforeFilter(){
		parent::beforeFilter();
		$this->layout = 'authake';
	}
}

