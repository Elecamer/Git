<?php 

	$conn=mysqli_connect("localhost","db_browser","graduation","Graduation");
	if(mysqli_connect_errno()){
		echo "failed...<br>";
	}
	else{
		$id=$_GET["id"];
		$passwd=$_GET["passwd"];
		if($id!=""&&$passwd!=""){
			mysqli_query($conn,"Insert into user_info values('$id','$passwd');");
			echo("Success!"); 
		}
	}
	?>
