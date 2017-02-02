<?php session_start();
	if(isset($_SESSION['token'])){
			header("Location: account.php");
}
?>
<html>
<head>
	<title></title>
</head>
<body>

<?php
$c = oci_connect("lou","apple","localhost/xe");
if (!$c) {
	$e= oci_error();
	trigger_error('Could not connect to the database:'.$e['message'],E_USER_ERROR);
}

?>

<form method="post", action="#">
	<h1> LOG-IN </h1>
	<label>Username :</label>
	<input type="text", name="username", placeholder="Enter Username"/> <br>
	<label>Password :</label>
	&nbsp;&nbsp;<input type="password", name="password", placeholder="Enter Password"/> <br>
	<input type="submit", name="submit",value="GO"/> <br>
	</form>

	<?php
	if(isset($_POST['submit'])){
	
		$c_user = addslashes($_POST['username']);
		$c_pass =addslashes ($_POST['password']);
		$sel_c = "select * from ACCOUNT where password ='".$c_pass."' AND username='".$c_user."'";
		$run_c = oci_parse($c, $sel_c);
		$ex = oci_execute($run_c);
		$a = oci_fetch_array($run_c);
		$check=oci_num_rows($run_c);
		while(($row=oci_fetch_array($run_c, OCI_ASSOC + OCI_RETURN_NULLS))!= False){
		
	}
		if($check == 0){
			echo "<script>alert('password or email is incorrect!')</script>";
		}else{
			echo $check;
			$_SESSION['token'] = $c_user;
			header("Location: account.php");
		}	
	}
?>
</body>
</html>
