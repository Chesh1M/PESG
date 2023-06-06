<?php
    $name = $_POST['name'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];
    $request = $_POST['request'];
    $message = $_POST['message'];

    $email_from = 'PESG';
    $email_subject = 'New Message';
    $enquirer_email_subject = '(autoresponse) Prime Edge SG Realty';

    $to = 'aowenc@gmail.com';

    $okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';

    $errorMessage = 'There was an error while submitting the form. Please try again later';

    $fields = array('name' => 'Name', 'phone_num' => 'Phone Number', 'email' => 'Email', 'request' => 'Request', 'message' => 'Message');

    try 
    {
        if(count($_POST) == 0) throw new \Exception('Form is empty');
                
        $emailText = "You have a new message from your contact form\n=========================================\n";
        $enquirerEmailText = "Thank you for contacting Prime Edge SG Realty! Please give us 2-3 business days to get back to your enquiry as we are currently experience high volume. \n\nIn the meantime, here is a copy of your message details!\n\n";

        foreach ($_POST as $key => $value) {
            // If the field exists in the $fields array, include it in the email 
            if (isset($fields[$key])) {
                $emailText .= "$fields[$key]: $value\n";
                $enquirerEmailText .= "$fields[$key]: $value\n";
            }
        }
        $enquirerEmailText .= "\n\nThank you for your patience,\nPrime Edge SG Realty\n\n *Please note that this email is an automated response that cannot accept incoming email. please do not reply to this email*";

        // All the necessary headers for the email.
        $headers = array('Content-Type: text/plain; charset="UTF-8";',
            'From: ' . $email_from,
            'Reply-To: ' . $email,
            'Return-Path: ' . $email_from,
        );
        // All the necessary headers for the enquirers email.
        $enquirersHeaders = array('Content-Type: text/plain; charset="UTF-8";',
            'From: ' . $email_from,
        );

        // Send email to Prime Edge SG Realty
        mail($to, $email_subject, $emailText, implode("\n", $headers));
        // Send email to enquirer
        mail($email, $enquirer_email_subject, $enquirerEmailText, implode("\n", $enquirersHeaders));

        $responseArray = array('type' => 'success', 'message' => $okMessage);
    }
    catch (\Exception $e)
    {
        $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    }


    // if requested by AJAX request return JSON response
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $encoded = json_encode($responseArray);

        header('Content-Type: application/json');

        echo $encoded;
    }
    // else just display the message
    else {
        echo $responseArray['message'];
    }

?>

