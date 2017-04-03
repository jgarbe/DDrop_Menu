<?php
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////

  require_once('inc/connectvars.php');



////////////////////////////////////////////////
///////////////////////////////////////////////
////////////////////////////////////////////////
///////////////////////////////////////////////
//////////////////////////////////////////////
print("<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js\"> </script> <!--jquery--> \n");
print("<script src=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js\"> </script> <!--jquery--> \n");

 print("<link href=\"http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\" type=\"text/css\" rel=\"stylesheet\">\n");

 
// print("<script src=\"//html5shiv.googlecode.com/svn/trunk/html5.js\"></script> \n");
 print("  <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.1.min.js\"></script>\n");
 print("  <script type=\"text/javascript\" src=\"js/jquery-ui-1.12.1.custom/jquery-ui.js\"></script>\n");
 
  print("  <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.1.min.js\"></script>\n");
 print("  <script type=\"text/javascript\" src=\"".HOME."js/jquery-ui-1.12.1.custom/jquery-ui.js\"></script>\n");


 printf("<style>
  #right_side{
 float:right;width: 50%;
  }
  #left_side {
  width: 50%;float:left;
  }
  
  #both_sides {
  width: 850px ;
   margin-left: auto ;
    margin-right: auto ;
  }
  
  </style>");
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function print_r2 ($Array) {
	echo "<pre>";
	print_r($Array);
	echo "<pre>"; }
	
//function is_even( $int ) {
    //return !( ( ( int ) $int ) & 1 );
//}	


///*******************************************************
 //* 
 //* 
 //* 	// Get all of the Categories
 //* 
 //* 
 //* ***************************************************/	
	
require_once('inc/function_get_and_order_categories.inc.php');
$cbundles=get_categories();

$cats=order_categories($cbundles);
 							
								
				
//print_r2($cbundles);							





print("<body>\n");

 print("<INPUT TYPE=\"button\" value=\"Home\"   class=\"daButt\" onClick=\"location.href='index.php'\"><br />\n");
print("<h2 style=\"text-align:center;\">DRAG-N-DROP</h2>\n");









/***********************************************************************
 * 
 * 
 * Left Side
 * 
 * 
 ************************************************************************/

print("<div id=\"left_side\" style=\"height:800px;overflow-y:scroll;width:100%;float:left;\">\n");    //the left side

print("<h2 style=\"text-align:center;\"></h2>\n");
/*****************************************
 * 
 * 
 * The Looping cascading menu function
 * 
 * 
 * ****************************************/
		print("<ul>\n");
		print("<div id=\"category_0\" class=\"c\">");
		print("<li style=\"height:15px;\">");
		print("Base Layer"); 
		print("</li>\n");
		print("</div>\n");
		print("</ul>\n");
		
		
		
function print_casc($cascade){
	if(!empty($cascade)){
print("<ul>\n");
 foreach($cascade as $cat_id => $nb){ //print(" The Category IS   ".$nb[0]."\n");
			print("<div id=\"category_".$cat_id."\" class=\"b\" style=\"z-index:".$nb[1].";\" >");
			print("<li style=\"height:15px;\">");
			print(" ".$nb[0].""); 
			print("</li>\n");
		
			print("</div>\n");
		if(!empty($nb[2])){ //loop through
			
			print_casc($nb[2]);
		}
		
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
				
				

print_casc($cats);   // Print the menu

print("</div>\n");  //End of Left Side 

/***********************************************************************
 * 
 * 
 * 
 * 
 * 
 ************************************************************************/
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
 //print_r2($bIDs);
 /********************************************************************
 * 
 * 
 * 
 * The Jquery calls first from the array
 * 
 * 
 * 
 * *******************************************************************/
 
 	print("<script>\n");
	print(" $(document).ready(function(){\n");
		
print("\n");

	

/*******************************
 * 
 * *********************************/	
	
print(" $('");

$itd=0; foreach($cbundles as $category_id =>$cart){
	if($itd!=0) {print(", ");}  // don't put a comma before the first one
print("#category_".$category_id."");
$itd++;

}
print("').draggable({ \n");
//print("	revert: \"invalid\",   \n");
//print(" 	containment: \"document\",    \n");
print("	helper: \"clone\", \n");
print("	cursor: \"pointer\", \n");
print(" start: function() {\n");
print("var dragged_id = $(this).attr(\"id\"); }\n");

print(" });\n");
	print(" $('");
print("#category_0");
	foreach($cbundles as $category_id =>$cart){
//	if($itd!=0) {print(", ");}  // don't put a comma before the first one
		
print(", ");
print("#category_".$category_id."");
$itd++;
		
	}
	print("').droppable({   \n");
	print("drop: function(event, ui) {\n");
	print("var uid = ui.draggable.attr(\"id\") + \":\" + $(this).attr(\"id\");\n");

   print("$.ajax({ \n");
 print("url: \"inc/ajax_drag_to_cat.inc.php\", \n");    
 print("     data: \"drag=\" + uid ,   \n");
 print("	cache: false	,					\n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
//print("alert(data); \n"); // test
print("location.replace('Category_Management.php');\n");   //reload the page
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }) ; \n");

	print("   }\n ");
	
	print("});\n");


	print("});\n");
	print("</script>\n");
 
 
 
 
 
 
 












print("</body>\n");
print("</html>\n");
/***************************************************
 * 
 * End the tabkle structure
 * 
 * 
 * 
 * ***************************************************/



?> 
