<?php
print("<script language=\"JavaScript\">\n");




print("var d = new Date()\n");
print("var fullYear = d.getFullYear();\n");  // This Year


 print("function addRows(tableID,thisForm,thisValue) {  \n");
 //print("alert(thisForm);\n");
 print("\t var table = document.getElementById(tableID); \n");
//print("alert(tableID);\n");
  print("\n\t var rowCount = table.rows.length ; \n");
 
print("if(rowCount < thisValue) { \n");

print("for (i = rowCount; i < thisValue; i++) { \n");
print(" \n");
  print("\n\t    var row = table.insertRow(i);  \n");
  
  print("\t   var cell1 = row.insertCell(0);   \n");
 print("\t   var element1 = document.createElement(\"input\");   \n");
 print("\t   element1.type = \"button\";  \n");
print("\t           element1.name=\"remove[\" + thisForm + \"][\" + i + \"]\";  \n ");
print("\t           element1.value=\"remove\";  \n ");
print("\t           cell1.appendChild(element1);    \n");

  print("\t      var cell2 = row.insertCell(1);     \n");
  print("\t      var countLabel = i + 1;     \n");
  
 print("\t      cell2.innerHTML = countLabel + \" \" + thisForm;    \n");
 //////////////////////////////////
  print("\t      var cell3 = row.insertCell(2);    \n");
 print("\t      var element2 = document.createElement(\"select\");    \n");
 print("\t      element2.setAttribute(\"id\", \"Mnth[\" + thisForm + \"][\" + i + \"]\");    \n");
 print("\t      element2.setAttribute(\"name\", \"Mnth[\" + thisForm + \"][\" + i + \"]\");    \n");
print("var mnth_l_option = document.createElement('option'); \n");
print("mnth_l_option.setAttribute('value', 0); \n");
print("mnth_l_option.appendChild( document.createTextNode( \"MM\") ); \n");
print(" element2. appendChild(mnth_l_option); \n");
print("for (var mnthCnt=1;mnthCnt < 13; mnthCnt++) {\n");
print(" var mnth_option = document.createElement('option'); \n");
print("mnth_option.setAttribute('value', mnthCnt); \n");
//print("if (element2.mnth_option.value = 0) {\n");
//print(" mnth_option.appendChild( document.createTextNode(\"MM\") ); \n");
//print(" } else {\n");
print("mnth_option.appendChild( document.createTextNode( mnthCnt) ); \n");
print(" element2. appendChild(mnth_option); \n");
print(" } \n");
print("\t       cell3.appendChild(element2);     \n");
/////////////////////////////////////// //////////////////////////////////
  print("\t      var cell4 = row.insertCell(3);    \n");
 print("\t      var element3 = document.createElement(\"select\");    \n");
 print("\t      element3.setAttribute(\"id\", \"Day[\" + thisForm + \"][\" + i + \"]\");    \n");
 print("\t      element3.setAttribute(\"name\", \"Day[\" + thisForm + \"][\" + i + \"]\");    \n");

print("var day_l_option = document.createElement('option'); \n");
print("day_l_option.setAttribute('value', 0); \n");
print("day_l_option.appendChild( document.createTextNode( \"DD\") ); \n");
print(" element3. appendChild(day_l_option); \n");
print("for (var dayCnt=1;dayCnt < 32; dayCnt++) {\n");
print(" var day_option = document.createElement('option'); \n");
print("day_option.setAttribute('value', dayCnt); \n");
print(" day_option.appendChild( document.createTextNode( dayCnt) ); \n");
print(" element3. appendChild(day_option); \n");
print(" } \n");
print("\t       cell4.appendChild(element3);     \n");
///////////////////////////////////////
/////////////////////////////////////// //////////////////////////////////
  print("\t      var cell5 = row.insertCell(4);    \n");
 print("\t      var element4 = document.createElement(\"select\");    \n");
 print("\t      element4.setAttribute(\"id\", \"Year[\" + thisForm + \"][\" + i + \"]\");    \n");
 print("\t      element4.setAttribute(\"name\", \"Year[\" + thisForm + \"][\" + i + \"]\");    \n");

 
print("var year_l_option = document.createElement('option'); \n");
print("year_l_option.setAttribute('value', 0); \n");
print("year_l_option.appendChild( document.createTextNode( \"YYYY\") ); \n");
print(" element4. appendChild(year_l_option); \n");
print("for (var yearCnt = fullYear;yearCnt < (fullYear+10); yearCnt++) {\n");  // This year plus ten
print(" var year_option = document.createElement('option'); \n");
print("year_option.setAttribute('value', yearCnt); \n");
print(" year_option.appendChild( document.createTextNode( yearCnt) ); \n");
print(" element4. appendChild(year_option); \n");
print(" } \n");
print("\t       cell5.appendChild(element4);     \n");
///////////////////////////////////////
 print("\t     } \n");
 print("\t     } \n");
 print("\t     } \n");

    print("</script> \n");

?>