<?php

require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$dit=$_GET['drag'];
	 $tst=explode(":",$dit);
		
	 $tset=explode("_",$tst[0]);
	 $tset2=explode("_",$tst[1]);
$category_id=mysqli_escape_string($dbc1,$tset[1]);	 
$category_merged=mysqli_escape_string($dbc1,$tset2[1]);



require_once('function_get_and_order_categories.inc.php');

$cbundles=get_categories();



function mergcheck($cb,$id,$mid){
		while(!empty($mid)){
	if($id==$mid) {  return 1;}
	$nn=$cb[$mid];
	$mid=$nn[1];
			 }
}

	$err= mergcheck($cbundles,$category_id,$category_merged);

if ($err=='')  {

					$ubquery="UPDATE category SET 
								category_merged = '".$category_merged."'
								WHERE category_id = '".$category_id."'";
					mysqli_query($dbc1,$ubquery);
	  
	
mysqli_close($dbc1);	
}
?>
