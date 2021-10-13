<?php
session_start();
include("config.php");


   // define variables and set to empty values
 $email_err = $password_err = "";





if ($_SERVER["REQUEST_METHOD"] == "POST"){
 $email = $_POST['email'];
  $password = $_POST['password'];
  
  
  
 //check for unique password 

 
  //the next code is for checking the form data
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  
  
  if (empty($_POST["password"])) {
    $password_err = "<span class='error'>Password is required!</span>";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
      $password_err = "<span class='error'>Only letters and white space allowed!</span>";
    }
  }
  if (empty($_POST["email"])) {
    $email_err = "<span class='error'>Email is required!</span>";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "<span class='error'>Invalid email format!</span>";
    }
  }

  //if validation is satified then create a token for the user 
  
  
        if ( $email_err == "" and $password_err == ""){
    
        $get_user = "select token from user_signup where email ='$email' AND password_user = '$password'";
        $run_user = mysqli_query($connect,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_code = $row_user['token'];

        if($user_code == 0){
            $email_err = "<span class='error'>Your email or password is incorrect</span>";
        }else{
            $_SESSION['token'] = $user_code;
            echo"<script>alert('window.open('user/dashboard.php','_self')')</script>";
            echo"<script>alert('login successful!')</script>";
        }
              
   }
}




  

  




        
  

?>