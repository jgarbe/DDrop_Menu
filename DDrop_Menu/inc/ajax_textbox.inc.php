<?php 
$p_id=$_GET['p_id'];
////////////////////////////////////////////////////////
$tselarr=explode(":",$p_id);
$column=$tselarr[0];
$ts=explode("_",$column); //$ts[0] = table_name
$item_id=$tselarr[1];
$value=$tselarr[2];
// print("alert(data); \n"); // test



require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection


                
			$update_query="UPDATE ".$ts[0]." SET ".$column." = '".$value."' WHERE  ".$ts[0]."_id = '".$item_id."'";
			
						
			mysqli_query($dbc0,$update_query);  

               mysqli_close($dbc0);
   

?>
