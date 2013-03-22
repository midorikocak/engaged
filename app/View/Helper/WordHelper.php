<?php
class WordHelper extends AppHelper 
{
	function strToTrUpper($value)
	{
		$value = str_replace("ç", "Ç", $value);
		$value = str_replace("ğ", "Ğ", $value);
		$value = str_replace("ı", "I", $value);
		$value = str_replace("i", "İ", $value);
		$value = str_replace("ö", "Ö", $value);
		$value = str_replace("ü", "Ü", $value);
		$value = str_replace("ş", "Ş", $value);
		$value = mb_strtoupper($value);
		$value = trim($value);
		return $value;
	}

	function strToTrLower($value)
	{
		$value = str_replace("Ç", "ç", $value);
		$value = str_replace("Ğ", "ğ", $value);
		$value = str_replace("I", "ı", $value);
		$value = str_replace("İ", "i", $value);
		$value = str_replace("Ö", "ö", $value);
		$value = str_replace("Ü", "ü", $value);
		$value = str_replace("Ş", "ş", $value);
		$value = strtolower($value);
		$value = trim($value);
		return $value;
	}

	function uCaseWords($value)

	{
		$value = $this->strToTrLower($value);
		$value = split(" ", trim($value));
		$value_tr = "";

		for($x=0; $x < count($value); $x++)
		{
			$value_first = mb_substr($value[$x], 0, 1);
			$value_last = mb_substr($value[$x], 1);
			$value_first = $this->strToTrUpper($value_first);

			$value_tr .= $value_first . $value_last ." ";
		}

		$value_tr = trim($value_tr);

		return $value_tr;
	}
}
?>