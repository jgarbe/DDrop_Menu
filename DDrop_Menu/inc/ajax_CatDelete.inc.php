<?php

require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$dit=$_GET['category_id'];
$category_id=mysqli_escape_string($dbc1,$dit);	 


					$dubquery="DELETE FROM category
								WHERE category_id = ".$category_id."";

					mysqli_query($dbc1,$dubquery);

					$ubquery="UPDATE category SET 
								category_merged = '0'
								WHERE category_merged = '".$category_id."'";
					mysqli_query($dbc1,$ubquery);
	  
	
mysqli_close($dbc1);	

?>
