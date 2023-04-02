<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
</head>
<body>
    
<div class="container">
    <div class="row">
        <?php
        if(isset($_POST['signup'])){
            extract($_POST);
            if(strlen($fname)<3){
                $error[]='Please enter first name using 3 character atleast';
            }
            if(strlen($fname)>20){
                $error[]='First Name: Max length 20 characters not allowed';
            }
            if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/",$fname)){
                $error[]='Invalid entry first name.Please enter letters without any
                digit or special symbols like(1,2,3,#,$,%,&,*,!,~,`,^,-,)';
            }
            if(strlen($lname)<3){
                $error[]='Please enter last name using 3 character atleast';
            }
            if(strlen($lname)>20){
                $error[]='Last Name: Max length 20 characters not allowed';
            }
            if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/",$fname)){
                $error[]='Invalid entry last name.Please enter letters without any
                digit or special symbols like(1,2,3,#,$,%,&,*,!,~,`,^,-,)';
            }
            if(strlen($email)>50){
                $error[]='Email: Max length 50 characters not allowed';
            }
            if($passwordConfirm==''){
                $error[]='please confirm the password.';
            }
            if($password !=$passwordConfirm){
                $error[]='Password do not match';
            }
            if(strlen($password)<5){
                $error[]='The password is 6 characters long.';
            }
            if(strlen($password)>20){
                $error[]='password: Max length 20 characters not allowed.';
            }
            
           $sql="select * from users where(email='$email');";
           $res=mysqli_query($dbc,$sql); 

           if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            
                   if($email==$row['email'])
                   {
                        $error[] ='Email alredy Exists.';
                      } 
                  }

                  if(!isset($error)){ 
                    $date=date('Y-m-d');
                  $options = array("cost"=>4);
          $password = password_hash($password,PASSWORD_BCRYPT,$options);
                  
                  $result = mysqli_query($dbc,"INSERT into users(fname,lname,email,password,date) values('$fname','$lname','$email','$password','$date')");
      
                 if($result)
          {
           $done=2; 
          }
          else{
            $error[] ='Failed : Something went wrong';
          }
       }
        }
        ?>
        <div class="col-sm-4">
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
                }
            }
            ?>
            </div>
        <div class="col-sm-4">
        <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:50px;">&#9989;</span> <br> You have registered successfully . <br> <a href="index.php" style="color:#fff;">Login here... </a> </div>
      <?php } else { ?>
            <div class="signup_form">
        <form action="" method="POST">
  <div class="form-group">
    <label class="label_txt"></label>
    <input type="text" class="form-control" name="fname" value="<?php if(isset($error)) {echo $fname;}?>" required="" placeholder="First Name"><br></div>
  <div class="form-group">
    <label class="label_txt"></label>
    <input type="text" class="form-control" name="lname" value="<?php if(isset($error)) {echo $lname;}?>" required="" placeholder="Last Name"><br></div>
<div class="form-group">
    <label class="label_txt"></label>
    <input type="email" class="form-control" name="email" value="<?php if(isset($error)) {echo $email;}?>" required="" placeholder="Email"><br></div>
 <div class="form-group">
    <label class="label_txt"></label>
    <input type="password" class="form-control" name="password" required="" placeholder="Password"><br></div>
<div class="form-group">
    <label class="label_txt"></label>
    <input type="password" class="form-control" name="passwordConfirm" required="" placeholder="Confirm Password"><br></div>
  
  <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">Signup</button>
  <?php } ?>
</form>
<p style="font-size: 12px;text-align: center;margin-top: 10px;"><a href="forgot-psssword.php" style="color:#00376b;">Forgot Password?</a></p>
<br>
<p> Have an account?<a href="index.php">Log in</a></p>
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

