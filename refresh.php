<?php 

	$conn=mysqli_connect("localhost","db_browser","graduation","Graduation");
	$id=$_GET['id'];
	$passwd=$_GET['passwd'];
	$auth=0;

	if(mysqli_connect_errno()){
		echo "failed...<br>";
	}
	else{
		if($id!=""&&$passwd!=""){
			$tmp= mysqli_fetch_array(mysqli_query($conn,"select count(Id) from user_info where Id='$id' and Passwd='$passwd';"));
		$auth= $tmp[0];
		}
	}

	if($auth==1){
 		$IP= $_SERVER['REMOTE_ADDR'];
		$PORT= $_SERVER['REMOTE_PORT'];
		$TIME=date("His");
	
		if( mysqli_query($conn,"Insert into p2p values('$id','$IP',$PORT);")!=1)
		{
	
			mysqli_query($conn,"update p2p set Ip='$IP',Port=$PORT where Id='$id';");
		} 
		mysqli_query($conn,"update user_info set Time=$TIME where Id='$id';");
	}
?>
