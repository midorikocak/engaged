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
App::uses('AppModel', 'Model');
class AuthakeAppModel extends AppModel {
	/**
	* Get Enum Values
	* Snippet v0.1.3
	* http://cakeforge.org/snippet/detail.php?type=snippet&id=112
	*
	* Gets the enum values for MySQL 4 and 5 to use in selectTag()
	*/
	function getEnumValues($columnName=null, $respectDefault=false) {
		if ($columnName==null)
		{
			return array();
		}

		//no field specified
		//Get the name of the table
		$db =& ConnectionManager::getDataSource($this->useDbConfig);
		$tableName = $db->fullTableName($this, false);//Get the values for the specified column (database and version specific, needs testing)
		$result = $this->query("SHOW COLUMNS FROM {$tableName} LIKE '{$columnName}'");//figure out where in the result our Types are (this varies between mysql versions)
		$types = null;

		if (isset($result[0]['COLUMNS']['Type'] ) )
		{
			$types = $result[0]['COLUMNS']['Type'];
			$default = $result[0]['COLUMNS']['Default'];
		}

		//MySQL 5
		elseif (isset($result[0][0]['Type'] ) )
		{
			$types = $result[0][0]['Type'];
			$default = $result[0][0]['Default'];
		}

		//MySQL 4
		else {
			return array();
		}

		//types return not accounted for
		//Get the values
		$values = explode('\',\'', preg_replace('/(enum)\(\'(.+?)\'\)/', '\\2', $types) );

		if ($respectDefault)
		{
			$assoc_values = array("$default"=>Inflector::humanize($default));

			foreach ($values as $value )
			{
				if ($value==$default)
				{
					continue;
				}

				$assoc_values[$value] = Inflector::humanize($value);
			}
		}
		else
		{
			$assoc_values = array();

			foreach ($values as $value )
			{
				$assoc_values[$value] = Inflector::humanize($value);
			}
		}

		return $assoc_values;
	}

	//end getEnumValues
}
?>