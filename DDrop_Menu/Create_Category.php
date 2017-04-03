<?php
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');
  // Generate the navigation menu

require_once('inc/function_get_and_order_categories.inc.php');
require_once('inc/function_cat_options.inc.php');
$cbundles=get_categories();

$cats=order_categories($cbundles);

				//print_r2($cats);

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 




print("<script src=\"js/jquery-1.11.0.min.js\"> </script> <!--jquery--> \n");
print("<script src=\"js/jquery-ui.min.js\"> </script> <!--jquery--> \n");
////////////////////////////////////////////////////////////////////////////////////////////
//
// Create the Jquery Scripts
////////////////////////////////////////////////////////////////////////////////////////////

print("<script>\n");

print("$(document).ready(function()\n");
print("  { \n");

	///////////////////////////////////////////////////////////////////////////////////////////////////////
// Adding
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\"#add_category\").click(function(){ \n");
   print("$.ajax({ \n");
 print("url: \"inc/ajax_new_category.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
print("location.replace('Create_Category.php');\n");
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");

  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Adding
//////////////////////////////////////////////////////////////////////////////////////////////////////



	///////////////////////////////////////////////////////////////////////////////////////////////////////
// Beginning of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\":text\").blur(function(){ \n");
			print("if($(this).attr('id') != $(this).val()){");
print(" var dataPut = $(this).attr('id') + \":\" + $(this).val(); \n");

//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/ajax_textbox.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
print("}");
  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////

 print("   }); \n");
print("</script>\n");
////////////////////////////////////////////////////////////////////////////////////////////
//
// Ending the jQuery scripts
////////////////////////////////////////////////////////////////////////////////////////////
print("<div class='scrollTableContainer'>");
print("<INPUT TYPE=\"button\" value=\"Add Category\"   id=\"add_category\">\n");
 print("<INPUT TYPE=\"button\" value=\"Home\"  onClick=\"location.href='index.php'\"><br />\n");
print("<table class=dataTable style=color:white;width:100%; cellspacing=0>");
	print("\t<thead>\n");
	
	print("\t<tr>\n");
	print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\t\n");   //blank for delete column
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tCategory Name\n");
	print("\t\t</th>\n");

	print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tSubcategory Of\n");
	print("\t\t</th>\n");
	
	print("\t</tr>\n");
	print("\t</thead>\n");
/////////////////////////////////////////////////////////////////
	print("\t<tbody>\n");

$name="category";	// Name of the menu table

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name."  ORDER BY category_name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
				$category_id=$row[0];
				$category_name=$row[1];
				$category_merged = $row[2];

	print("\t<tr>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'> ");
///////////////////////////////////////////////////////////////////////////////////////////////////////
//     Deleting Script
//////////////////////////////////////////////////////////////////////////////////////////////////////	
print("<script>\n");

print("$(document).ready(function(){\n");
	   print(" $(\"#del_".$category_id."\").click(function(){ 	\n");
    print(" var hmm = confirm(\"Are you Sure you want to delete this Category.\?  Subcategories will move to Base ".$category_id." \")	\n");
    print(" if (hmm == true) {\n");
    print("$.ajax({ \n");
 print("url: \"inc/ajax_CatDelete.inc.php?category_id=".$category_id."\" , \n");    
 print("	cache: false	,					\n");
 //print("       dataType: 'json',   //expect json               \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(){ \n");		//With a sccessful shift name ajax call
 
 print("    alert(\"Tada\"); \n");
print("location.replace('Create_Category.php');\n");
 print("     } , \n");	//End of the successful shift name call	
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
print(" }; \n");				//End the Shift name Ajax Call
 print(" }); \n");







 print("   }); \n");
print("</script>\n");
///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Deleting Script
//////////////////////////////////////////////////////////////////////////////////////////////////////	
print("<INPUT TYPE=\"button\" value=\"Delete\" id=\"del_".$category_id."\">\n");
//print("".$t[0]."\n");


print("</td>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'> ");
	print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"category_name_".$category_id."\" size=\"32\"  id = \"category_name:".$category_id."\" value=\"".$category_name."\">");
	print("</td>\n");


	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
	
	/**********************************************************
 * Select Subcategory
 * *******************************************************/					
print("<script>");

print("$(document).ready(function()\n");
print("  { \n");
///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\"#category_merged_".$category_id."\").change(function(){ \n");

print(" var dataPut =  $(this).val(); \n");

//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/ajax_textbox.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
print("location.replace('Create_Category.php');\n");   //reload the page
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");

  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////

 print("   }); \n");
print("</script>");	
	
	
	
					   	print("<SELECT  id=\"category_merged_".$category_id."\" NAME=\"category_merged_".$category_id."\">\n");
					   	
print("<OPTION VALUE='category_merged:".$category_id.":0'>Base</OPTION>");
			
				
							cat_options($cats,$category_id,0,"Base");
			
		
			print("</SELECT> \n");
		

	print("</td>\n");
	
	
 
		print("\t</tr>\n\t<tr>\n");


	print("\t</tr>");



}

	print("\t</tbody>\n");
print("</table>");
print("</div>");
  mysqli_close($dbc);




?>


<div class="push"></div>
</div>
</body>
</html>
