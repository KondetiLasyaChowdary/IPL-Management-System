<?php

    //session_start();

    $con = mysqli_connect("localhost", "root", "", "ipl") or die(mysqli_error($con));

    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $rp=$_POST['conpsw'];
      if($password==$rp){
    $check_u = "insert into login values('$username','$password')";
    
      if(mysqli_query($con,$check_u)){

   
      echo "<script type='text/javascript'>alert('ACCOUNT CREATED!!');</script>";
      header("refresh: 0.01; url=login.html");
    }

    else
    {
      echo "<script type='text/javascript'>alert(' ACCOUNT NOT CRETAED!!');</script>";
     header("refresh: 0.01; url=create.html");
    }
  }
  else
  {
     echo "<script type='text/javascript'>alert('PASSWORDS DIDN'T MATCH!!');</script>";
      header("refresh: 0.01; url=create.html");
    
  }
?>