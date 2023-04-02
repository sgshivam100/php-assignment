<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-4">
            </div>
        <div class="col-sm-4">
            <div class="login_form">
        <form action="login_process.php" method="POST">
  <div class="mb-3">
  <?php 
if(isset($_GET['loginerror'])) {
	$loginerror=$_GET['loginerror'];
}
 if(!empty($loginerror)){  echo '<p class="errmsg">Invalid login credentials, Please Try Again..</p>'; } ?>
    <label for="exampleInputEmail1" class="label_txt"></label>
    <input type="email" name ="login_var" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"><br>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"><br>
  </div>
  
  <button type="submit" name="sublogin" class="form_btn">Login</button>
</form>
<!-- <p style="font-size: 12px;text-align: center;margin-top: 10px;"><a href="forgot-psssword.php" style="color:#00376b;">Forgot Password?</a></p>
<br> -->
<p>Don't have an account?<a href="signup.php">Sign up</a></p>
</div>
            </div>
        <div class="col-sm-4">
            </div>
        
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</html>