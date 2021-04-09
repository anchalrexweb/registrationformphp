<?php
$con = mysqli_connect("localhost","root","","registration");
extract($_POST);
// insert data to database

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword']) &&  isset($_POST['phone'])){
    

    $query =  "INSERT INTO `registrationtable1`(`name`, `email`, `password`, `confirmpassword`,  `phone`) VALUES ('$name','$email','$password','$confirmpassword','$phone')";
    $result = mysqli_query($con,$query);
    header("Location: welcome.php");
}
?>