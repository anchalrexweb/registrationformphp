<?php
  session_start();
  
?>
<!DOCTYPE html>
<html>
<head>
    <title>FORMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

  <style>
    body {
            background:url(background.jpg) no-repeat  ;
            background-position: center;
            background-size:cover;
            background-attachment: fixed;
            height: 100vh;
          }
    .contain, #loginform{
              position: relative;
              width : 30%;
              margin: 2% auto 0;
              padding:2%;
              border: 1px solid black;
              background: rgba(0, 0, 0, 0.6);
              color:white;
              border-radius: 25px;
              
            }
    h3,h4{
      text-align:center;
      font-family: 'Lobster', cursive;
    }
    form{
      font-family: 'Caveat', cursive;
    }
    label{
      font-weight:bold;
    }
    p{
      text-align:center;
    }
  </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Forms</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      
    </ul>
   
  </div>
</nav>


<!-- login form -->
<div id="loginform">
        <h4 class="modal-title text-center">Login</h4>
        <form method="post">
            <div class="form-group">
              <label for="useremail">Email address</label>
              <input type="email" class="form-control" id="useremail" name= "useremail" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="userpassword">Password</label>
              <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Password">
            </div>
            <div class="form-row">
              <div class = "form-group col-md-12">
                <button class="btn btn-danger btn-block"  name="loginbtn">LOGIN</button>
              </div>
              </div>
        </form>
        <p>Are you new? <a href="#" id="register">Register</a></p>
</div>

    


<!-- forms -->

<div class="contain">
<h3>Registration</h3>
<form method="post" >
  <!-- username -->
  <div class="form-group">
    <label for="name">User Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Username" required>
  </div>
<!-- email  -->
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="enter email" required>
  </div>
  <!-- email and password -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Password" required>
    </div>
    <div class="form-group col-md-6">
      <label for="cpass">Confirm Password</label>
      <input type="password" class="form-control" name="cpass" id="cpwd" placeholder="confirm password" required>
    </div>
  </div>
<!-- phone number -->
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone number" required>
  </div>
<!-- button -->
  <div class=" form-row">
    <div class = "form-group col-md-12">
      <button name="submit" id="submit" class="btn btn-info btn-block">Create Account</button>
    </div>  
  </div>
</form>
<p>Have an account? <a href="#" id="logbtn">Login</a></p>
</div>

<?php

// session_start();
$con = mysqli_connect("localhost","root","","registration");
// insert data to database

if(isset($_POST['submit'])){
    $name = $_POST['name'];  
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword=$_POST['cpass'];
    $phone = $_POST['phone'];
    $emailquery = "select * from registrationtable1 where email = '$email'";
    $output= mysqli_query($con,$emailquery);
    $emailcount = mysqli_num_rows($output);
    if($emailcount>0){ ?>
      <script> alert("email already exist");</script>
    <?php }else{
      if($password == $confirmpassword){
        $query =  "INSERT INTO `registrationtable1`(`name`, `email`, `password`, `confirmpassword`,  `phone`) VALUES ('$name','$email','$password','$confirmpassword','$phone')";
        $saved = mysqli_query($con,$query);
        if($saved){?>
          <script> alert("registration succesful")</script>
        <?php }
      }else{ ?>
        <script> alert("password not matching");</script>
      <?php }
    }
}

// login
if(isset($_POST['loginbtn'])){
  // ob_start();
  
  // session_start();
      $useremail = $_POST['useremail'];
      $userpass = $_POST['userpassword'];
      $sql =  "select * FROM registrationtable1 where email ='$useremail' and password = '$userpass'";
      $result=  mysqli_query($con,$sql);

      $row = mysqli_fetch_assoc($result);
      if(is_array($row)) {

        // session_start();
        $_SESSION["email"] = $row['email'];
        $_SESSION["name"] = $row['name'];
      }else{ ?>
        <script> alert("invalid id or password"); </script>
    <?php  }

if(isset($_SESSION["email"])) { ?>
  <script> window.open("welcome.php","_self"); </script>
  <?php } }
?>
<script>
  $(document).ready(function(){
    $("#loginform").hide();
    $("#logbtn").on("click",function(){
      $(".contain").hide();
      $("#loginform").show();
    });
    $("#register").on("click",function(){
      $(".contain").show();
      $("#loginform").hide();
    });
  });
</script>
</body>
</html>