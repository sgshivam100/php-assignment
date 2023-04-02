<?php require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:index.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{


$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
$oldfname =$res['fname']; 
}
 ?> 
 <!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
           
     <form action="" method="POST" enctype='multipart/form-data'>
  <div class="login_form">

  <?php 
 if(isset($_POST['update_profile'])){
$fname=$_POST['fname'];
 $lname=$_POST['lname'];  

$sql="SELECT * from users where email='$email'";
      $res=mysqli_query($dbc,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

   if($oldfname!=$fname){
     if($fname==$row['fname'])
     {
           $error[] ='fname already Exists. Create Unique fname';
          } 
   }
}
    if(!isset($error)){ 
          
           $result = mysqli_query($dbc,"UPDATE users SET fname='$fname',lname='$lname' WHERE email='$email'");
           if($result)
           {
       header("location:account.php?profile_updated=1");
           }
           else 
           {
            $error[]='Something went wrong';
           }

    }


        }    
        if(isset($error)){ 

foreach($error as $error){ 
  echo '<p class="errmsg">'.$error.'</p>'; 
}
}


        ?> 
     <form method="post" enctype='multipart/form-data' action="">
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 
            <center>

  </center>
           </div>
            <div class="col"><p><a href="logout.php"><span style="color:red;">Logout</span> </a></p>
         </div>
          </div>

          <div class="form-group">
          <div class="row"> 
            <div class="col-3">
                <label>First Name</label>
            </div>
             <div class="col">
                <input type="text" name="fname" value="<?php echo $fname;?>" class="form-control">
            </div>
          </div>
      </div>
      <div class="form-group">
 <div class="row"> 
            <div class="col-3">
                <label>Last Name</label>
            </div>
             <div class="col">
                <input type="text" name="lname" value="<?php echo $lname;?>" class="form-control">
            </div>
          </div>
      </div>
     
           <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
<button  class="btn btn-success" name="update_profile">Save Profile</button>
            </div>
           </div>
       </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>