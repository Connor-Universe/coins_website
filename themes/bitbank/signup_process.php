<?php
include("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/vendor/autoload.php';


   // define variables and set to empty values
$first_name_err = $email_err = $last_name_err = $password_err = $username_err = "";
$first_name = $email = $last_name= $username = $password = $success = $fail = "";




if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $first_name= $_POST['first_name'];
  $last_name = $_POST['last_name'];
    $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $email2 = $_POST['email2'];

  
  
 //check for unique password 

 $get_password = "select password_user from user_signup";
 $run_password = mysqli_query($connect,$get_password);
 $column_password = mysqli_fetch_array($run_password);

 //check for unique username

 $get_username = "select username from user_signup";
 $run_username = mysqli_query($connect,$get_username);
 $column_username = mysqli_fetch_array($run_username);

 //check for unique email address

 $get_email = "select email from user_signup";
 $run_email = mysqli_query($connect,$get_email);
 $column_email = mysqli_fetch_array($run_email);


  //the next code is for checking the form data
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if (empty($_POST["first_name"])) {
    $first_name_err = "<span class='error'>First name is required!</span>";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
      $first_name_err = " <span class='error'>Only letters and white space allowed!</span>";
    }
  }
  if (empty($_POST["last_name"])) {
    $last_name_err = "<span class='error'>Last name is required!</span>";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $last_name_err = "<span class='error'>Only letters and white space allowed!</span>";
    }
  }
  if (empty($_POST["username"])) {
    $username_err = "<span class='error'>Username is required!</span>";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        $username_err = "<span class='error'>Only letters and white space allowed!</span>";
      }elseif(in_array($username,$column_username)){
        $username_err = "<span class='error'>This username is already in use</span>";
    }
    }
  
  if (empty($_POST["password"])) {
    $password_err = "<span class='error'>Password is required!</span>";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
      $password_err = "<span class='error'>Only letters and white space allowed!</span>";
    }elseif($password != $password2){
        $password_err = "<span class='error'>Your passwords are not the same </span>";
      } elseif(in_array($password,$column_password)){
        $password_err = "<span class='error'>This password is already in use</span>";
    }
  }
  if (empty($_POST["email"])) {
    $email_err = "<span class='error'>Email is required!</span>";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "<span class='error'>Invalid email format!</span>";
    }elseif($email != $email2 ){

        $email_err = "<span class='error'>Your emails are not the same </span>";
      }elseif(in_array($email,$column_email)){
        $email_err = "<span class='error'>This email is already in use</span>";
    }
  }

  //if validation is satified then create a token for the user 
  
  
        if ($first_name_err == "" and $last_name_err == "" and $email_err == "" and $username_err == "" and $password_err == ""){
    
        
                function loopToken(){
                    function getToken(){
                        return mt_rand(100000,1000000000);
                     }
                     $token = getToken();
                     $verified = false;
                     $connect = mysqli_connect("localhost","root","","coins_db");
                     //this is to check that the token is unique
                     $get_user_token = "select token from user_signup";
                     $run_user_token = mysqli_query($connect,$get_user_token);
                     $column_user_token = mysqli_fetch_array($run_user_token);
                    
                if(in_array($token,$column_user_token) != true){
                    
                    
                        $insert_user = "INSERT INTO user_signup (first_name,last_name,username,email,password_user,token,verified) VALUES
                        ('$GLOBALS[first_name]','$GLOBALS[last_name]','$GLOBALS[username]','$GLOBALS[email]','$GLOBALS[password]','$token','$verified')";
                        
                        $run_user = mysqli_query($connect,$insert_user);
                        
                        echo"<script>alert('registration successful')</script>";
                        $first_name = $email = $last_name= $username = $password = "";
                        $success = "<span class='success'>You were sent a confirmation email, click the link in the email to verify</span>";
                        $mail = new PHPMailer;
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                        $mail->isSMTP(); 
                
                        
                        $mail->Host='smtp.gmail.com';
                        $mail->Port=587;
                        $mail->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->SMTPAuth=true;
                        $mail->SMTPAutoTLS = false;
                        $mail->SMTPOptions = array(
                          'ssl' => array(
                          'verify_peer' => false,
                          'verify_peer_name' => false,
                          'allow_self_signed' => true
                          )
                          );
                        
                        
                        $mail->Username='';
                        $mail->Password='';
                       /* In this section here you will need to put the email address and password of a valid gmail account so that your smtp will work
                       if you dont then it wont work, so i suggest you create a dummy email addres for the site so that you can use the email address and password 
                       of the email address on the site */
                        $mail->setFrom('yousiteemail@gmail.com');
                        /* The set from email address has to be different from the one you use in the username/password section*/
                        $mail->addReplyTo('onukwube.dew208@gmail.com',$first_name,$last_name);
                        $mail->addAddress($email);
                        
                
                        $mail->isHTML(true);
                        $mail->Subject='Verification Email:';
                        $mail->Body="<p align=center>Click this link to verify your account <a href='welcomepage.php?id=$username&&$token'></a></p>";
                        /* If you look above you will see a link to the welcome page or the dashboard...remember this code above wont work...your supposed to put the
                        domainname/welcomepage.php?id etc...but since your working on local host, it wont work, so once you get the stuff hosted you can test it out using 
                        an actual domain name */
                        if(isset($_GET['id'])){
                            $verified= true;
                            $insert_user = "UPDATE user_signup SET verified = $verified where token = $token";
                            
                            $run_user = mysqli_query($connect,$insert_user);
                            
                        }
                
                    }elseif(in_array($token,$column_user_token) == true){
                        function getToken2(){
                            return mt_rand(100000,1000000000);
                            
                        }
                        $token = getToken2();
                        loopToken();
                    }
                }
                loopToken();
   }
}




  

  




        
  

?>