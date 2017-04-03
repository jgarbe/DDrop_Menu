<?php


function cat_cascIDs($ca,$id){
	$ctreturn=$id;
			foreach ($ca as $cat_id => $nm){
										
					if($nm[1]==$id){
							//$ctreturn=$ctreturn.",".$cat_id;
							
								
									$bas=$cat_id;
					$ctreturn = $ctreturn.",".cat_cascIDs($ca,$bas);
						}
						
						}
										
											
										return $ctreturn;
											}
				
				

			?>
