<?php
require 'config/database.php';
if(isset($_POST['submit'])){
$firstname= filter_var($_POST['firstname']);
$lastname= filter_var($_POST['lastname'] );
$username= filter_var($_POST['username']);
$email= filter_var($_POST['email']);
$createpassword= filter_var($_POST['createpassword']);
$confirmpassword= filter_var($_POST['firstname']);
$avatar = $_FILES['avatar'];


if(!$firstname){
    $_SESSION['signup'] = "please enter your first name";
}elseif(!$lastname){
    $_SESSION['signup'] = "please enter your last name";
}
elseif(!$username){
    $_SESSION['signup'] = "please enter your user name";
}elseif(!$email){
    $_SESSION['signup'] = "please enter your email";
}elseif(strlen($createpassword)<8 || strlen($confirmpassword) <8){
    $_SESSION['signup'] = "password should be 8+ characters";
}elseif(!$avatar['name']){
    $_SESSION['signup'] = "please add avatar ";
}else{
    if($createpassword !== $confirmpassword){
        $_SESSION['signup'] = "password do not match";
    }else{
       $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT) ;
       echo $createpassword . '<br>';
       echo $hashed_password;
    }
}
}else{
    header('location:' .ROOT_URL . 'signup.php' );
    die();
}