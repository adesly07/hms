<?php
include ('db_connect.php');
if(!isset($_session)){
session_start();
}
$msg = "Login";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = mysqli_real_escape_string($db,$_POST['username']);	
$password = mysqli_real_escape_string($db,$_POST['password']);
$password = md5($password);	
$query = "SELECT * FROM tbladmin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $query);
           if($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$count = mysqli_num_rows($result);
			$section = $row['Section'];
			if($section == "Administrator"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['section'] = $section;
            header('Location:mgt/');
			} else {
			$_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['section'] = $section;
            header('Location:receiptionist/');	
			} 
		   }
			 if(!mysqli_num_rows($result))			
			{
       
           $msg = "<span class='redtext'>Invalid username or password</span>";
			}
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>UI Hotel Management System</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.js" crossorigin="anonymous"></script>
   <link rel="icon" type="image/x-icon" href="images/favicon.png">

</head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                  <h3 class="text-center font-weight-light my-4"><img src="images/logo.png" width="250px"></h3>
                                  <h3 class="text-center font-weight-light my-4"><?php echo $msg; ?></h3>
                              </div>
                                <div class="card-body">
                              <form name="form1" action="index.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <button class="btn btn-primary" type="submit" name="login">LOGIN</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?php echo date('Y'); ?> <a href="uiventureslimited.com">UI Ventures.</a> All Rights Reserved</div>
                            <div>
                                Developed by
                                &middot;
                                <a href="updateng.com" target="_blank">Update Nigeria and Brightzity Technologies</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
