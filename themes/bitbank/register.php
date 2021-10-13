<?php

session_start();

require_once("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$output = '';

$errors = array();




if (isset($_POST['signup-btn'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

      //to check if an email already exists
    // $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1"; 
    // $stmt = $conn->prepare($emailQuery);
    // $stmt->bindParam('s', $email,);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $userCount = $result->num_rows;
    // $stmt->close();

    // if ($userCount > 0) {
    //     $errors['email'] = "Email already exists";
    // }
  

  if(!empty($username) && !empty($email) && !empty($password)){
    $password = password_hash($password, PASSWORD_DEFAULT);

    function getToken($len=32){
      return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
    }
    $token = getToken(10);
    $verified = false;

    $insert = $conn->prepare("INSERT INTO users SET
          username=:username,
          email=:email,
          password=:password,
          verified=:verified,
          token=:token");
          $insert->execute(array(
            'username'  => $username,
            'email'     => $email,
            'password'  => $password,
            'verified'  => $verified,
            'token'     => $token
          ));
    // $sql = "INSERT INTO users (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param('ssbss', $username, $email, $verified, $token, $password);

    if ($stmt->execute()) {
      //login user
      $user_id = $conn->insert_id;
      $_SESSION['id'] = $user_id;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['verified'] = $verified;
      // flash message
      $_SESSION['message'] = "You are now logged in!";
      $_SESSION['alert-class'] = "alert-success";
      header('location: welcomepage.html');
      exit(); 


 } else {
     $errors['db_error'] = "Database error: failed to register";
 }




        
          require 'phpmailer/PHPMailerAutoload.php';

          $mail =  new PHPMailer(true);

          $mail->Host='smtp.gmail.com';
          $mail->Port='587';
          $mail->SMTPAuth=true;
          $mail->SMTPSecure='tls';

          try{
            $mail->setForm('coinsglobalinvestment@gmail.com', 'User Registration');
            $mail->addAddress($_POST['email']);

            $mail->isHTML(true);
            $mail->subject = 'Confirm email';
            $mail->body = 'Activate your email:
            <a href="http://coinsglobal.com/verification.php?email=' . $email . '&token=' . $token . '">Confirm email</a>';

            $mail->send();
            $output = 'Message sent!';
          }catch (Exception $e) {
            $output = $mail->ErrorInfo;
          }
  }
}
?>