<?php session_start();
	if(!isset($_SESSION['token'])){
			header("Location: home.php");
}
		?>
	
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Users</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #BA173E;
    color: white;
}
</style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="account.php">
                        My Library
                    </a>
                </li>
                <li>
                    <a href="user.php">Users</a>
                </li>
                <li>
                    <a href="book.php">Books</a>
                </li>
                <br>
                <br>
                <li>
                    <a href="logout.php">Log Out </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

<!-- PHP DB ORACLE USER -->
<?php
$c = oci_connect("lou","apple","localhost/xe");
if (!$c) {
    $e= oci_error();
    trigger_error('Could not connect to the database:'.$e['message'],E_USER_ERROR);
}
$s = oci_parse($c, "select * from books");

if (!$s) {
    $e=oci_error($c);
    trigger_error('Could not parse statement:'.$e['message'],E_USER_ERROR);
}
$r = oci_execute($s);
if (!$r) {
    $e=oci_error($s);   
    trigger_error('Could not execute statement:'.$e['message'],E_USER_ERROR);
}
echo "<table border='1'>\n";
$ncols = oci_num_fields($s);
echo"<tr>\n";
for($i=1;$i<=$ncols;++$i){
    $colname=oci_field_name($s, $i);
    echo "<th><b>".htmlentities($colname, ENT_QUOTES)."</b></th>\n";
}
echo "</tr>\n";
while(($row = oci_fetch_array ($s,OCI_ASSOC + OCI_RETURN_NULLS)) != False){
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "<td>".($item!==null?htmlentities($item,ENT_QUOTES):"&nbsp;")."</td>\n";
    }
    echo "<tr>\n";
}
echo "<table>\n";
?>
<!-- End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>
