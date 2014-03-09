<?php
	//create all possible strings of i length
	$String='';
	$currentCharacter=32;
	function genChar($RString,$len)
	{
		$currentChar
		if($len<=0)
		{
			return $RString;
		}
		while($currentChar<=126)
		{
			echo chr($currentChar).genChar($currentChar,$len-1);
			$currentChar+1;
		}
	}
	genChar($currentChar,2)
?>