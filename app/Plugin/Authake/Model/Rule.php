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
App::uses('AuthakeAppModel', 'Authake.Model');
class Rule extends AuthakeAppModel {
	var $name = 'Rule';
	var $useTable = 'authake_rules';
	var $belongsTo = array('Group' => array('className' => 'Authake.Group', 'foreignKey' => 'group_id', 'order' => 'Rule.order ASC' ) );
	var $useDbConfig = 'authake';
	function getRules($group_ids, $cleanRegex = false) {

		if (is_array($group_ids))
		{
			//if no group get rules for the all users (with group_id is null)
			$groups = implode(',', $group_ids);
			$conditions = "Rule.group_id IN ({$groups}) OR Rule.group_id is NULL";
		}
		else
		{
			$conditions = 'Rule.group_id is NULL';
		}

		$fields = '';
		$order = 'Rule.order ASC, Rule.group_id ASC';
		$data = $this->find('all', array('conditions'=>$conditions, 'fields'=>$fields, 'order'=>$order, 'contain'=>array()));

		if ($cleanRegex)
		{
			$nb = count($data);

			for ($i=0; $i<$nb; $i++)
			{
				$data[$i]['Rule']['action'] = str_replace(array('/','*', ' or '), array('\/', '.*', '|'), $data[$i]['Rule']['action']);
			}
		}

		return $data;
	}
}
?>