<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['btn-send']))
    {
       $name = $_POST['name'];
       $Email = $_POST['Email'];
       $Subject = "Liostasi Query";
       $Msg = $_POST['msg'];

       require_once "PHPMailer/PHPMailer.php";
       require_once "PHPMailer/SMTP.php";
       require_once "PHPMailer/Exception.php";

      
       $mail = new PHPMailer();
       $mail -> isSMTP();
       $mail -> Host = "smtp.gmail.com";
       $mail -> SMTPAuth = true;
       $mail -> Username = ""; //your email id
       $mail -> Password = ''; //your password
       $mail -> Port = 465;
       $mail -> SMTPSecure = "ssl";

       // email settings
       $mail -> isHTML(true);
       $mail -> setFrom($Email, $name);
       $mail -> addAddress(""); //your email id
       $mail -> Subject = ("$Email ($Subject)");
       $mail -> Body = $Msg;

       if(empty($name) || empty($Email) || empty($Subject) || empty($Msg))
       {
           header('location:index.php?error#contact');
       }

       if ($mail->send()) {
           $status = "success";
           $response = "Email is sent";
           header("Location:index.php?success#contact");
           
       }
       else{
            $status = "failed";
           $response = "Something is wrong";
       }
       // exit(json_encode(array("status" = > $status, "response" => $response)));
    }
    
?>