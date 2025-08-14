<?php 
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $message = $_POST['message'];

 if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $receiver = "growmore655@gmail.com";
        $subject = "From: $name <$email>"; // subject like From: Dhruv <abc@gmail.com>
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message\n\nRegards: \n$name";
        $sender = "From: $email";
        /*if(mail($receiver, $subject, $body, $sender)){
            echo "Your Message has been Sent!";
        }else{
            echo "Sorry, Failed To send your Message!";
        }*/
    }else{
        echo "Enter a Valid Email Address";
    }

 }else{
    echo "Email and Message field is required!";
 }


?>