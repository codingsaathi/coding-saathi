<?php
    

class Sendmail{
    
function getMailStatus(){
    //Check For Submit
        $status = '';
        //Get Form Data
        $name = htmlspecialchars($_POST['name']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $title = htmlspecialchars($_POST['title']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $status = '3';
            } else {
                // Passed
                // Recipient Email
                $toEmail = 'codingsaathiteam@gmail.com';
                $subject = ''.$title;
                $body = '<h2>Contact Request</h2>
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Phone Number</h4><p>'.$phone.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Message</h4><p>'.$message.'</p>
                    ';

                //Email Headers
                $headers ="MIME-Version: 1.0" ."\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

                // Additional Headers
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                if(mail($toEmail, $subject, $body, $headers)){
                    // Email Sent
                    $status = '1';
                } else {
                    //Failed
                    $status = '2';
                }
            }
        
    return $status;
}
    
}
        
$test = new Sendmail();
    echo $test->getMailStatus();
?>