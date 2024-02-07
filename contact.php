<?php

$servername = "localhost";
$username = "bitappstechcom_bitappstechcom";
$password = "~AL[DI&_m4z(";
$dbname = "bitappstechcom_bitapps";

if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO contact_us (`name`, `email`, `subject`, `message`)
    VALUES ('$name','$email','$subject','$message')";
    
    if ($conn->query($sql) === TRUE) {
        $apiToken = "5149954230:AAHcqT-Ie3HwlDGCQUMc2r7tyxD5_W0CocQ";
        $data = [
            'chat_id' => '-1001714842001',
            'text' => 'Name: '.$_POST['name'].'<pre>\n</pre>  email: '.$_POST['email'].'<pre>\n</pre>  Subject: '.$_POST['subject'].' <pre>\n</pre>  Message: '.$_POST['message'],
            'parse_mode' => 'HTML'
      
        ];
        
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
        ?><script>alert('Your message has been sent. Thank you!');
        window.location.replace("index.php");
        </script>
        <?php
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
    }


if(ISSET($_POST['subscribe'])){
  {
$email=$_POST['email'];
$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO subscribed_email (`email`)
  VALUES ('$email')";
  
  if ($conn->query($sql) === TRUE) {
    ?><script>alert('Thank you for Subscribe us. ');
    window.location.replace("index.php");
    </script>
    <?php
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

  }

}
?>