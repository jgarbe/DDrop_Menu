<?php

//require_once('function_get_and_order_categories.inc.php');



print("<script>\n");
  print("  $( function() {\n");
  print("    $( \"#menu\" ).menu({\n"); 
   /****************************************************************8
 * 
 * Uncomment to cascade back to the right within a div
 * 
 * ******************************************************************/
 // print("   \"position\": {\n");
  //print("       my: \"right top\",\n"); 
  //print("       at: \"left top\",\n");
  //  print("  collision: 'flipfit'\n");    
//print(" }\n"); 
/***********************************************************************
 * 
 * 
 * 
 * 
 * *****************************************************************/  
  print("    } );\n");
  print("    } );\n");
print("</script>\n"); 

  
 print("<link rel=\"stylesheet\" href=\"js/jquery-ui-1.12.1.custom/jquery-ui.css\">\n"); 
 // print("<link rel=\"stylesheet\" href=\"/resources/demos/style.css\">\n"); 
  
 print(" <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>\n"); 
 print(" <script src=\"js/jquery-ui-1.12.1.custom/jquery-ui.js\"></script>\n"); 
  
require_once('inc/function_get_and_order_categories.inc.php');

$cats=order_categories($cbundles);
 function print_r2 ($Array) {
	echo "<pre>";
	print_r($Array);
	echo "<pre>"; }				
	//print_r2($cats);
/*************************************************
 * 
 * 
 * 
 * **********************************************/	
/****************************************************
 * 
 * 
 * Associate Links here -- Possibly MySQL data?
 * 
 * ****************************************************/	
	

	
	
	
	function print_casc($cascade){
		if(!empty($cascade)){
print("<ul>\n");
 foreach($cascade as $cat_id => $nb){ //print(" The Category IS   ".$nb[0]."\n");
		
			print("<li>");
			print("<div>");
			print("<a  href='index.php?cid=".$cat_id."'\">".$nb[0]."</a>");
			print("</div>\n");
					if(!empty($nb[2])){ //loop through
			print_casc($nb[2]);
		}
			print("</li>\n");
		

		
	} //end of foreach cascade
	
print("</ul>\n");
		}
				}
/*****************************************
 * 
 * 
 * The End of Looping cascading menu function
 * 
 * 
 * ****************************************/

			if(!empty($cats)){
print("<ul  id=\"menu\">\n");
 foreach($cats as $cat_id => $nb){ //print(" The Category IS   ".$nb[0]."\n");
		
			print("<li >");
			print("<div>");
			print("<a  href='index.php?cid=".$cat_id."'\">".$nb[0]."</a>");
			print("</div>\n");
				if(!empty($nb[2])){ //loop through
			print_casc($nb[2]);
		}
			print("</li>\n");
		

		
	} //end of foreach cascade
	
print("</ul>\n");
		}

	?>
