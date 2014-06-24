<?php
if($_POST)
{
    $to_Email       = $_POST["adminEmail"]; //Replace with recipient email address
    $subject        = 'Website contact from '.$_POST["userName"]; //Subject line for emails
    
    
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    
        //exit script outputting json data
        $output = json_encode(
        array(
            'type'=>'error', 
            'text' => '<div class="alert alert-danger">Request must come from Ajax</div>'
        ));
        
        die($output);
    } 
    
    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["userName"]) || !isset($_POST["userInfo"]) || !isset($_POST["userMessage"]))
    {
        $output = json_encode(array('type'=>'error', 'text' => '<div class="alert alert-danger">A required field is missing. Please try emailing <a href="mailto:'.$to_Email.'">'.$to_Email.'</a> directly.</div>'));
        die($output);
    }

    //Sanitize input data using PHP filter_var().
    $user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $user_Email       = filter_var($_POST["userInfo"], FILTER_SANITIZE_EMAIL);
    $user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);
        
    //proceed with PHP email.

    /*
    Incase your host only allows emails from local domain, 
    you should un-comment the first line below, and remove the second header line. 
    Of-course you need to enter your own email address here, which exists in your cp.
    */
    $headers = 'From: '. $to_Email . "\r\n" .
    //$headers = 'From: '.$user_Email.'' . "\r\n" . //remove this line if line above this is un-commented
    'Reply-To: '.$user_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
        // send mail
    $sentMail = @mail($to_Email, $subject, $user_Message .'  -'.$user_Name.' ('.$user_Email.')', $headers);
    
    if(!$sentMail)
    {
        $output = json_encode(array('type'=>'error', 'text' => '<div class="alert alert-danger">Could not send mail! Please try emailing <a href="mailto:'.$to_Email.'">'.$to_Email.'</a> directly.</div>'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' => '<div class="alert alert-success">Thank you for your email. <br/>We&rsquo;ll get back to you soon!</div>'));
        die($output);
    }
}
?>