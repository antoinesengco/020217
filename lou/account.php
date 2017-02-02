<?php session_start();
	if(!isset($_SESSION['token'])){
			header("Location: home.php");
}

		?>
	
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>

<style>
div .design {
    background-color: lightgrey;
    width: 300px;
    border: 25px solid maroon;
    padding: 25px;
    margin-top: 220px;
    margin-left: 420px;
}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Library</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>

<body background="img/shel.jpg">

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
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
                    <div class="design">
                    	<h3> Welcome admin: &nbsp; &nbsp; &nbsp;<?php echo $_SESSION['token'];?></h3>
                    	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<button><a href="logout.php">Log Out </a></button>
                    </div>	
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
