<?php

	//produces same result useful for recursion
	print(hash('sha512',rtrim( '!' . chr(0) , chr(0) )));
	print('<br>');
	print(hash('sha512',chr(33)));		
?>
