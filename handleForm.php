<?php
if(isset($_POST['submitIndividual'])) //if isset(company), if isset(individualsubmt), if isset(contactussubmit) in the same .php file
{
    $apiToken = "5778657679:AAEE44my1cXtakcM_Na-03ESL9Cnorv3lR4";
    $first = $_POST['firstName'];
    $last = $_POST['LastName'];
    $phone = $_POST['phoneNumber'];
    $email = $_POST['email'];
   $radio = $_POST['first'];
    $book = $_POST['book'];



    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbName = "forminput";

    $con = mysqli_connect($host, $user, $password, $dbName);

    if (isset($_FILES['uploadProposal']['name']))
    {
      $file_name = $_FILES['uploadProposal']['name'];
      $file_tmp = $_FILES['uploadProposal']['tmp_name'];

        $i = 1;
        $actual_name = pathinfo($file_name,PATHINFO_FILENAME);
        $original_name = $actual_name;
        $extension = pathinfo($file_name, PATHINFO_EXTENSION); 

//rename file name if duplicated
      while (file_exists('pdf/'.$actual_name.".".$extension))
      {          

        $actual_name = (string)$original_name.$i;
        $file_name = $actual_name.".".$extension;
        $i++; 
      }
 
      move_uploaded_file($file_tmp,"./pdf/".$file_name);
      $fileName_path="pdf/".$file_name;
      $insertquery =
      "INSERT INTO users(id, user_fName,user_lName, user_email, user_phone, radio, presentation, user_file) VALUES('','$first','$last', ' $email','$phone','$radio', '$book', '$fileName_path')";
      $iquery = mysqli_query($con, $insertquery);

     
        }
  
    else
    {
       
    }
                       
                       //send to telegram 
    $data = [
        'chat_id' => '-1001853261257', 
        'text' => 'From Join Our Community Individuals-Section'."\r\n" .'Name : '. $first.' '.$last."\r\n".'Phone Number: '.$phone."\r\n".
          'Email : '.$email ."\r\n" .'how long have you been working on this idea? '. $radio. "\r\n".'presentation : '.$book
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) ); 

    echo '<script>
    alert("You have successfully submitted. Thankyou!");
    window.location.replace("NewIndex.php");
    </script>';  
}
else if(isset($_POST['submitCompany']))
{
    $apiToken = "5778657679:AAEE44my1cXtakcM_Na-03ESL9Cnorv3lR4";
    $companyName = $_POST['companyName'];
    $phoneC = $_POST['phoneC'];
    $emailC = $_POST['companyEmail'];
    $radio = $_POST['check'];
    $presentation = $_POST['presentation'];


    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbName = "forminput";

    $con = mysqli_connect($host, $user, $password, $dbName);

    if (isset($_FILES['companyProposal']['name']))
    {
      $proposal = $_FILES['companyProposal']['name'];
      $file_tmp = $_FILES['companyProposal']['tmp_name'];

      //rename filename(proposal) if duplicated
        $i = 1;
        $actual_name = pathinfo($proposal,PATHINFO_FILENAME);
        $original_name = $actual_name;
        $extension = pathinfo($proposal, PATHINFO_EXTENSION); 

      while (file_exists('pdf/'.$actual_name.".".$extension))
      {          

        $actual_name = (string)$original_name.$i;
        $proposal = $actual_name.".".$extension;
        $i++; 
      }
     //trade registration
      if (isset($_FILES['tardeRegistration']['name']))
      {
        $trade = $_FILES['tardeRegistration']['name'];
        $file_tmp1 = $_FILES['tardeRegistration']['tmp_name'];
  
        //rename filename(trade) if duplicated
          $i = 1;
          $actual_name = pathinfo($trade,PATHINFO_FILENAME);
          $original_name = $actual_name;
          $extension = pathinfo($trade, PATHINFO_EXTENSION); 
  
        while (file_exists('pdf/'.$actual_name.".".$extension))
        {          
  
          $actual_name = (string)$original_name.$i;
          $trade = $actual_name.".".$extension;
          $i++; 
        }
      
                 //tin certificate
          if (isset($_FILES['tinCertificate']['name']))
         {
        $tin = $_FILES['tinCertificate']['name'];
        $file_tmp2 = $_FILES['tinCertificate']['tmp_name'];

             //rename filename(tin) if duplicated
        $i = 1;
       $actual_name = pathinfo($tin,PATHINFO_FILENAME);
       $original_name = $actual_name;
        $extension = pathinfo($tin, PATHINFO_EXTENSION); 

       while (file_exists('pdf/'.$actual_name.".".$extension))
       {          

       $actual_name = (string)$original_name.$i;
       $tin = $actual_name.".".$extension;
       $i++; 
       }
             //VAT Registration
       if (isset($_FILES['vatRegistration']['name']))
       {
      $vat = $_FILES['vatRegistration']['name'];
      $file_tmp3 = $_FILES['vatRegistration']['tmp_name'];

           //rename filename(VAT) if duplicated
      $i = 1;
     $actual_name = pathinfo($vat,PATHINFO_FILENAME);
     $original_name = $actual_name;
      $extension = pathinfo($vat, PATHINFO_EXTENSION); 

     while (file_exists('pdf/'.$actual_name.".".$extension))
     {          

     $actual_name = (string)$original_name.$i;
     $vat = $actual_name.".".$extension;
     $i++; 
     }

                    //upload propsal
         move_uploaded_file($file_tmp,"./pdf/".$proposal);
         $proposal_path="pdf/".$proposal;
        
         //upload trade
         move_uploaded_file($file_tmp1,"./pdf/".$trade);
         $trade_path="pdf/".$trade;

         //upload tin
         move_uploaded_file($file_tmp2,"./pdf/".$tin);
         $tin_path="pdf/".$tin;
         
         //upload vat
          move_uploaded_file($file_tmp3,"./pdf/".$vat);
          $vat_path="pdf/".$vat;
      $insertquery =
      "INSERT INTO company(id, company_Name, company_Phone, company_Email, company_radio, presentation, proposal, trade_registration, tin_certificate, vat_registration) 
      VALUES('','$companyName','$phoneC', '$emailC','$radio', '$presentation', '$proposal_path', '$trade_path', '$tin_path', '$vat_path')";
      $iquery = mysqli_query($con, $insertquery);

    }
      }
        }
      }
    else
    {
       
    }

                         //send to telegram channel
    $data = [
       'chat_id' => '-1001853261257', 
        'text' => 'From Join Our Community Company-Section'."\r\n" .'Name : '. $companyName.' '."\r\n".'Phone Number: '.$phoneC."\r\n".
          'Email : '.$emailC ."\r\n" .'how long have you been working on this idea? : '. $radio. "\r\n".'presentation : '.$presentation
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );  

    echo '<script>
    alert("You have successfully submitted. Thankyou!");
    window.location.replace("NewIndex.php");
    </script>';  
}
  
?>

