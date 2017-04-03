<?php


				function cat_options($ca,$id,$b,$fw){
						if(!empty($ca)){
								foreach ($ca as $cat_id => $nm){
										$nn=$fw." : ".$nm[0];
					if($cat_id==$id){
			print("<OPTION VALUE='category_merged:".$id.":".$b."'");
						print("selected");
			print(">".$fw."</OPTION>");
			}else{				
			print("<OPTION VALUE='category_merged:".$id.":".$cat_id."'");
			print(">".$nn."</OPTION>");
			
									$bas=$cat_id;	
							cat_options($nm[2],$id,$bas,$nn);
						}
						}
				}
				
			}
			?>
