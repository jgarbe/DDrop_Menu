<?php
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////


 
require_once('inc/appvars.php');
require_once('inc/connectvars.php');

print("<html>\n");

print("<head>\n");

// print("<link href=\"http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css\" type=\"text/css\" rel=\"stylesheet\">\n");
 print("  <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.1.min.js\"></script>\n");
 

print("</head>\n");

/**********************************************************
 * 
 * 
 * 
 * *********************************************************/
 
print("<body>\n");

 print("<INPUT TYPE=\"button\" value=\"Menu Management\"  onClick=\"location.href='Category_Management.php'\"><br />\n");
 print("<INPUT TYPE=\"button\" value=\"Edit and Create Menu Items\" onClick=\"location.href='Create_Category.php'\"><br />\n");
require_once('inc/function_get_and_order_categories.inc.php');
require_once('inc/function_cat_cascIDs.inc.php');
$cbundles=get_categories();
$cascIDs='';
if(!empty($cid)){$cascIDs = cat_cascIDs($cbundles,$cid);}

print("".$cascIDs."");

///////////////////////////////////////////////////////////////////////

print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
	/////////////////////////////////////////////////////////////////////////////////////////////////
	print("<div style=\"width:25%;position:relative;float:left;\">\n"); //left side of page div
	include('inc/public_menu.inc.php');
	print("</div>\n");	/////////////////////////////////////////////////////////////////////////////////////////////////

print("</div>");

print("<div class=\"push\"></div>\n");

print("<div class=\"footer\">\n");
print("</div>\n");







 
print("</body>\n");
print("</html>\n");
?>
