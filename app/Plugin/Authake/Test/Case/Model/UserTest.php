<?php
/*
This file is part of Authake.

Author: Mutlu Tevfik Koçak (mtkocak.net)
Contributors:

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

App::uses('User','Authake.Model');

class UserTestCase extends CakeTestCase {

	public $fixtures = array('plugin.authake.user');
	public $User;

	public function setUp() 
	{
		parent::setUp();
		$this->User = ClassRegistry::init('Authake.User');
	}

	public function testObject() 
	{
		$this->assertTrue(is_object($this->User));
	}

	public function testLoginData()
	{
		$login='admin'; 
		$password='admin';
		$result = $this->User->getLoginData($login, $password);
		$expected = $this->User->getLoginData($login, $password);
		$this->assertEquals($expected, $result);
	}
}
?>