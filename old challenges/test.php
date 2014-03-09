<?php
	/*
		Info: Server-Side implementation of a system to create rainbow tables for all possible combinations of an n length string
		Limitations: 
			* Currently limited to an 8 character string 
			* Needs implementation of sql framework
			* Needs to not always start at the beginning of all combinations .... perform rainbow table lookup 
			* possible conversions to Js or some other client side implementation to split work load
			* Multithreading

	*/
	echo "<table>";
	echo "<tr><td>Key</td><td>Hash</td></tr>";
	function hashIt($len)
	{	
		//switch for selecting length of string
		switch ($len) {
			case 1:
				$i2=$j2=$k2=$l2=$m2=$n2=$o2=126;
				$p2=32;
				break;
			case 2:
				$i2=$j2=$k2=$l2=$m2=$n2=126;
				$o2=$p2=32;
				break;
			case 3:
				$i2=$j2=$k2=$l2=$m2=126;
				$n2=$o2=$p2=32;
				break;
			case 4:
				$i2=$j2=$k2=$l2=126;
				$m2=$n2=$o2=$p2=32;
				break;
			case 5:
				$i2=$j2=$k2=126;
				$l2=$m2=$n2=$o2=$p2=32;
				break;
			case 6:
				$i2=$j2=126;
				$k2=$l2=$m2=$n2=$o2=$p2=32;
				break;
			case 7:
				$i2=126;
				$j2=$k2=$l2=$m2=$n2=$o2=$p2=32;
				break;
			case 8:
				$i2=$j2=$k2=$l2=$m2=$n2=$o2=$p2=32;
				break;
			default:
				$i2=$j2=$k2=$l2=$m2=$n2=$o2=$p2=127;			
				break;
		}

		//loop through all character combinations
		for ($i=$i2; $i < 127; $i++) { 
			for ($j=$j2; $j < 127; $j++) { 
				for ($k=$k2; $k < 127; $k++) { 
					for ($l=$l2; $l < 127; $l++) { 
						for ($m=$m2; $m < 127; $m++) { 
							for ($n=$n2; $n < 127; $n++) { 
								for ($o=$o2; $o < 127; $o++) { 
									for ($p=$p2; $p < 127; $p++) { 
										//first column is string
										echo "<tr>";
										echo "<td>";
										switch ($len) {
											case 1:
												print(chr($p));
												break;
											case 2:
												print(chr($o) . chr($p));
												break;
											case 3:
												print(chr($n) . chr($o) . chr($p));
												break;
											case 4:
												print(chr($m) . chr($n) . chr($o) . chr($p));
												break;
											case 5:
												print(chr($l) . chr($m) . chr($n) . chr($o) . chr($p));
												break;
											case 6:
												print(chr($k) . chr($l) . chr($m) . chr($n) . chr($o) . chr($p));
												break;
											case 7:
												print(chr($j) . chr($k) . chr($l) . chr($m) . chr($n) . chr($o) . chr($p));
												break;
											case 8:
												print(chr($i) . chr($j) . chr($k) . chr($l) . chr($m) . chr($n) . chr($o) . chr($p));
												break; 
											default:
												//do nothing
												break; 
										}
										
										echo "</td>";
										//second column is sha512 hash
										echo "<td>";
										switch ($len) {
											case 1:
												print(hash( 'sha512',chr($p)));
												break;
											case 2:
												print(hash( 'sha512',chr($o) . chr($p)));
												break;
											case 3:
												print(hash( 'sha512',chr($n) . chr($o) . chr($p)));
												break;
											case 4:
												print(hash( 'sha512',chr($m) . chr($n) . chr($o) . chr($p)));
												break;
											case 5:
												print(hash( 'sha512',chr($l) . chr($m) . chr($n) . chr($o) . chr($p)));
												break;
											case 6:
												print(hash( 'sha512',chr($k) . chr($l) . chr($m) . chr($n) . chr($o) . chr($p)));
												break;
											case 7:
												print(hash( 'sha512',chr($j) . chr($k) . chr($l) . chr($m) . chr($n) . chr($o) . chr($p)));
												break;
											case 8:
												print(hash( 'sha512',chr($i) . chr($j) . chr($k) . chr($l) . chr($m) . chr($n) . chr($o) . chr($p)));
												break; 
											default:
												//do nothing
												break;
										}
						
										echo"</td>";
										echo "</tr>";
									}
								}
							}
						}
					}
				} 
			}
		}

	}
	hashIt(1);
	hashIt(2);
	echo"</table>";

	//TODO: add insert to sql db and then implement functions for rainbow table lookup
?>