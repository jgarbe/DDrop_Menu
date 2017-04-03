<?php
function get_categories(){


/*******************************************************
 * 
 * 
 * 	// Get all of the Categories
 * 
 * 
 * ***************************************************/	
	


require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}
  /***********************************
  * Categories Query
  * *********************/  
  
  					 $querybuc = "SELECT * FROM category
							  ORDER BY category_casc DESC";
  	 $bucarray=mysqli_query($dbc1,$querybuc);
	 while ($bucarr = mysqli_fetch_array($bucarray)) {
		 
							$cbundles[$bucarr[category_id]]=array($bucarr[category_name],$bucarr[category_merged]);
		
}
/********************************************************
 *   End Query
 * ********************************************************/
						return $cbundles;
}

function order_categories($cbundles) {


$ind=0;  // only use if needing an extra css
  function merge_arr($cb,$i,$ind){  // array,category_id
//print("$i");
$ind=$ind+1;
foreach($cb as $cat_id => $cr){
			if ($cr[1] == $i){     // if the merged_id = category_id
				$d[$cat_id][0]=$cr[0];	
				$d[$cat_id][1]=$ind;				//create the array to be sent
				$d[$cat_id][]=merge_arr($cb,$cat_id,$ind);  // loop into merged arrays
			}
}
								return $d;
}



 
				//print("Category Management test array line 118\n");				print_r2($cbundles);
	foreach($cbundles as $cat_id => $cr){
		//print_r2($cr);
		if(empty($cr[1])){ //check if it's merged into
			//print("".$cr[1]."\n");
				$cats[$cat_id][0]=$cr[0];
				$cats[$cat_id][1]=$ind;
				$cats[$cat_id][]=merge_arr($cbundles,$cat_id,$ind);
				
		}
	} 							
	

return $cats;


}


?>
