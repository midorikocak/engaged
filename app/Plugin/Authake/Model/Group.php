<?php
/*
    This file is part of Authake.

    Author: Jérôme Combaz (jakecake/velay.greta.fr)
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
App::uses('AuthakeAppModel', 'Authake.Model');
class Group extends AuthakeAppModel {
	var $name = 'Group';
	var $useTable = 'authake_groups';
	var $recursive = 1;
	var $hasMany = array('Rule' => array('className' => 'Authake.Rule', 'exclusive' => false, 'dependent' => false, 'foreignKey' => 'group_id', 'order' => 'Rule.order ASC' ) );
	var $useDbConfig = 'authake';
	var $hasAndBelongsToMany = array('User' => array('className' => 'Authake.User', 'joinTable' => 'authake_groups_users', 'foreignKey' => 'group_id', 'associationForeignKey'=> 'user_id', 'order' => 'User.id', 'displayField' => 'login' ) );
}
?>