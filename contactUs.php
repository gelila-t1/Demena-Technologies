<?php
 if(isset($_POST['submit']))
 {
     $apiToken = "5778657679:AAEE44my1cXtakcM_Na-03ESL9Cnorv3lR4";
     $full = $_POST['fullName'];
     $email = $_POST['email'];
     $phone = $_POST['phoneNumber'];
     $companyName = $_POST['companyName'];
     $message = $_POST['message'];
     $data = [
         'chat_id' => '-1001853261257', 
         'text' => '   From Contact Us : '. "\r\n". 'Name : '. $full."\r\n". 'Email : '.$email."\r\n". 'Phone Number : '
         .$phone ."\r\n". 'Company Name : '. $companyName."\r\n".'Message : '.$message
     ];
     $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );  
    
     echo '<script>alert("Your message has been sent successfully. Thankyou!");
     window.location.replace("NewIndex.php");</script>';  
   
 }
  
?>