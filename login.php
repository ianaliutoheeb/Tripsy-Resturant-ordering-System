<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #5c4ac7;
	  }
	  </style>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  
</head>

<body>

<header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark" style = " background: white ; color:Red;">
                <div class="container" style = " color:Red;">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php" style = " color:Red;font-weight: bolder;">  <b>TRISPY FAST FOOD </b> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" style = " color:Red;  font-size: medium; font-weight: bold;" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" style = " color:Red; font-size: medium; font-weight: bold;" href="menu.php">Menu <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active" style = " color:Red; font-size: medium; font-weight: bold;">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active" style = " color:Red; font-size: medium; font-weight: bold;">Register</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active" style = " color:Red; font-size: medium; font-weight: bold;">My Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active" style = " color:Red; font-size: medium; font-weight: bold;">Logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
<div style=" background-image: url('images/img/pimg.jpg');">

<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id']; 
										 header("refresh:1;url=index.php"); 
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; 
                                }
	 }
	
	
}
?>
  

<div class="pen-title" >
</div>

<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2 style="color:red;">Login to your account</h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Username"  name="username"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="submit" id="buttn" name="submit" value="Login" style = " background:Red;" />
    </form>
  </div>
  
  <div class="cta" style="color:black;">Not registered?<a href="registration.php" style="color:red;"> Create an account</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

   
  <div class="container-fluid pt-3">
	<p></p>
  </div>


  <footer class="footer">
            <div class="container">
          
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3 address color-gray">
                                    <h5>Address</h5>
                                    <p>
                                        A108 Adam Street <br>
                                        Zaria, Kaduna State - Nigeria<br>
                                    </p>
                        </div>
                        <div class="col-xs-12 col-sm-3 additional-info color-gray">
                                    <h5>Opening Hours</h5>
                                    <p><strong>Mon-Sat: 11AM</strong> - 23PM<br> Sunday: Closed </p>
                        </div>
                        <div class="col-xs-12 col-sm-3 additional-info color-gray">
                                    <h5>Reservations</h5>
                                    <p>
                                        <strong>Phone:</strong> +1 5589 55488 55<br>
                                        <strong>Email:</strong> info@example.com<br>
                                    </p>
                                   
                        </div>
                    </div>
                </div>
                <div style = " color:white; text-align: center; align-content: center;">
                    <div> <hr > </div>
                    <div class="copyright">
                        &copy; Copyright <strong><span>TRISPY</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed & Develop by <a href="https://iaiict.abu.edu.ng/" style = "color: Red;">Project Group</a>
                    </div>
                </div>
            </div>
        </footer>
    
       


</body>

</html>
