<?php
    require_once('open-connection.php');
    if(isset($_POST['btnLogin'])){
        $username = htmlspecialchars($_POST['txtusername']);
        $password = htmlspecialchars($_POST['txtusername']);
        
        $username = stripslashes($username); //removal of single
        $password = stripslashes($password);

        $username = mysqli_real_escape_string($con, $username); //escaping any attempts for sql injection
        $password = mysqli_real_escape_string($con, $password);

        $password = md5($password); //hash the password

        $strSql = "
        SELECT * FROM users 
        WHERE username = '$username'
        AND password = '$password' 
        ";

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/></head>
    <link rel="stylesheet" href="css/index.css">
<!------ Include the above in your HEAD tag ---------->
    <title>Log in Page</title>
</head>
<body>
<form method="post">
<div class="container">
	<div class="row">
		 <h1><i class="fa fa-lock" aria-hidden="true"></i> Login</h1>
       
        </div><br /><br />
         
        
                	<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
								</div>
								<input type="text"  name="txtusername" id="txtusername" class="form-control" placeholder="username or email"/>
							</div><br />
         
                	<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key icon"></i></span>
								</div>
									<input type="Password" name="txtpassword" id="txtpassword" class="form-control" placeholder="password"/>
							</div><br />
            <div class="checkbox">
            
            </div><br />
            <button type="submit" name="btnLogin" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Login</button>
         <br><br>
         <?php

        if($rsLogin = mysqli_query($con, $strSql)){
            if(mysqli_num_rows($rsLogin) > 0){
                echo 'Welcome to the System';
            mysqli_free_result($rsLogin);
                } 
            }
            else
            echo 'Invalid Username/Password';
        }
        else 
            echo 'Could not execute your request.';
        require_once('close-connection.php');

    
         ?>

        <div class="footer">
        <br>
                  <p>Don't have an Account! <a href="#">Sign Up Here</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</form>
</body>
</html>