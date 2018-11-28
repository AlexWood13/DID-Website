<?php

// Checks if reCAPTCHA has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  function post_captcha($user_response) {
      $fields_string = '';
      $fields = array(
          'secret' => '6Lf-YHUUAAAAAIeiUQF30nQfg8mg44C-iBnd11GL',
          'response' => $user_response
      );
      foreach($fields as $key=>$value)
      $fields_string .= $key . '=' . $value . '&';
      $fields_string = rtrim($fields_string, '&');
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
      curl_setopt($ch, CURLOPT_POST, count($fields));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
      $result = curl_exec($ch);
      curl_close($ch);
      return json_decode($result, true);
  }
  // Call the function post_captcha
  $res = post_captcha($_POST['g-recaptcha-response']);
  if (!$res['success']) {
    header("Location: index.php?error=reCAPTCHAfail");
    exit();
  } else {

//checks if form  has been submitted
if (isset($_POST['submit'])) {

  //grabbing data from form
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['message'];

  //Error handlers

  //checking for empty inputs
  if (empty($name) || empty($subject) || empty($mailFrom) || empty($message)) {
    header("Location: index.php?error=emptyfields&name=".$name."&mail=".$mailFrom);
    exit();
  }

  //checking for an invalid e-mail.
  else if (!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
      header("Location: index.php?error=invalidmail&name=".$name."&mail=".$mailFrom);
      exit();
  }

  else {
    //setting data to variables
    $mailTo = "ajwood1998@depffleague.co.uk";
    $headers = "From: ".$mailFrom;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message;

    //sending data to email with text formatted
    mail($mailTo, $subject, $txt, $headers);

    //reloading the page once completed and displaying email success message
    header("Location: index.php?mailsent=successful");
    exit;
  }

    }
  }
}
 ?>
