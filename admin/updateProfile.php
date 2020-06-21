<?php 
if($_POST['update'])
{

	include('../config.php');
    extract($_POST);
	// print_r($_POST);
	$user_id=$_SESSION['admin_id'];
	if($update_type=="experience")
	{
		 $totalrecord=count($field7);
		
		if($totalrecord)
		{
			// delete all past trans_exp
			$del=mysqli_query($conn,"delete from trans_exp where user_id='$user_id'");
			$q="INSERT INTO `trans_exp`(`user_id`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`,  `field_type`) VALUES";
			$q1='';
			$q2='';
			$q3='';
			    for($i =0; $i<=$totalrecord; $i++)
			   {  
					if(isset($field1[$i]) || isset($field2[$i]) || isset($field3[$i]) || isset($field4[$i]) || isset($field5[$i]))
					{


				   // echo $field7[$i];
				   // echo "</br>";
					$s_id=$field7[$i];
				   if($s_id==1)
				   {
					    if($field2[$i] || $field3[$i] || $field4[$i] || $field5[$i])
						{
							 $q1.=" ($user_id,'$field1[$i]','$field2[$i]','$field3[$i]','$field4[$i]','$field5[$i]','','$field7[$i]'),";
						}
				   } else if($s_id==2)
				   {
					   if($field2[$i] || $field3[$i])
					  $q2.=" ($user_id,'$field1[$i]','$field2[$i]','$field3[$i]','','','','$field7[$i]'),"; 
				   } else if($s_id==3)
				   {
					   if($field2[$i] || $field3[$i] || $field4[$i] || $field5[$i] || $field6[$i])
					   $q3.=" ($user_id,'$field1[$i]','$field2[$i]','$field3[$i]','$field4[$i]','$field5[$i]','$field6[$i]','$field7[$i]'),";  
				   }
			   }
			}     
		}
		$q=$q.$q1.$q2.$q3;
		$finalqury=substr($q, 0, strlen($q) - 1);
		// echo $finalqury;
  		 // die;
		$exp_insert=mysqli_query($conn,$finalqury);
		
	}
}
 echo "<script>window.location.href='profile.php';</script>";
    exit;
?>
