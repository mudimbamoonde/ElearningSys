<?php
require "include/config.php";
session_start();
if(isset($_SESSION["username"])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Learning System : Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!--    <!-- bootstrap wysihtml5 - text editor -->
    <!--    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->

    <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="dist/js/html5shiv.min.js"></script>
    <script src="dist/js/respond.min.js"></script>
    <![endif]-->

</head>
<body >


<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<div class="col-md-1"></div>
<div class="col-md-4 col-md-offset-3 vertical-off-2">
	<div class="panel panel-default login-form"  style="color:black;opacity: 0.9;">
	<div class="panel panel-heading" style="background-color: #9f191f">
	</div>
	  	<div class="panel-body">
	  		<form method="post">
                <div id="messagePost">
                    <!--                        --><?php //if(!empty($message)){echo $message; }?>
                </div>
		    	<fieldset>

					<div class="form-group">
				    	<label for="username">username</label>
				    	<input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
  						<div class=""></div>
				  	</div>
				  	<div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				  	</div>					  						 
				  	<div class="col-md-3"></div>
                    <a href="#" class="col-md-6 btn btn-zp login-button" id="loginpotter">Login</a>
                    <br>
		    	</fieldset>
                <div class="col-md-4"></div>
                <a href="forgotpassword.php" style="font-size:large;color: #9f191f">Forgot Password?</a>
		    </form>
	  	</div>
	</div>
</div>

<?php include "include/javaScript.php"?>

</body>
<style type="text/css">
	
.vertical-off-4 {
	margin-top: 100px;
}


label{
    color: #9f191f;
}


.login-form fieldset legend {
	padding: 5px;
	text-align: center;
	font-size: 10px;
}
.btn-zp{
    border-radius:30px;
    background-color: #7d6e7e;
    color: whitesmoke;
}
.btn-zp:hover{
    color: #ff0046;
}

input{
    color: #001a35;
}

.login-button {
	padding: 10px;
	font-size: 20px;	
}

.calendars-popup {
    z-index: 10000;
}

.create-modal {
	height: 500px;
	overflow: auto;
}

.edit-modal {
	height: 570px;
	overflow: auto;
}

.candidate-photo {
	width: 65px;
	height: 70px;
}

.upload-photo {
	height: 400px;
	width: 345px;
}

.div-hide {
	display: none;
}

.classSideBar {
	cursor: pointer;
}

/*removes the calendar days*/
.alternate-dates {
	display: none;
}

</style>
</html>