 <?php
        print("<script>\n"); 
         print("function remove_Item(str)\n"); 
         print("{\n"); 
         print("if (str==\"\")\n"); 
         print("{\n"); 
         print("document.getElementById(\"garboDiffTime\").innerHTML=\"\";\n"); 
         include('inc/ajax.inc.php');
         print("document.getElementById(\"garboDiffTime\").innerHTML=xmlhttp.responseText;\n"); 
         print("}\n"); 
         print("}\n"); 
         print("xmlhttp.open(\"GET\",\"inc/new_timestamp.php?q=\"+str,true);\n"); 
         print("xmlhttp.send();\n"); 
         print("}\n"); 
          print("</script>\n");
?>