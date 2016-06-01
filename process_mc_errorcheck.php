<?php

// Let's check for errors:
  // 400-series errors (code 400-499) indicate a bad request. Do not retry without fixing this error first.
    if ($user_status >= 400 && $user_status <= 499 && $user_status != 404) {
      // echo 'Oh no! An error: '.$user_status;
      // echo '<br><br>';
      echo 'Looks like one of our trained monkeys did something naughty! No problem, we will fix that and get you signed up too.';
      // Get Data to send error alertemail
      // Send error alert message
      mail( $admin_email, "Mailchimp form is FUBAR!",
      "Your Mailchimp subscription form is broken. Manually subscribe this pereon: $email",
      "From: Mailchimp form ".$admin_email );
      $is_error = "yes";
  // IF 500-series errors (500-599), Mailchimp server error, tell user to try again later or store and retry later with chron or some other trigger.
    } elseif ($user_status >= 500 && $user_status <= 599) {
      // echo 'Oh no! An error: '.$user_status;
      // echo '<br><br>';
      echo 'I tried phoning up Mailchimp, but looks like their servers are down. No problem, we got you covered and will add you to the newsletter list.';
      // Get Data to send error alertemail
      // Send error alert message
      mail( $admin_email, "Mailchimp servers are DOWN!",
      "Mailchimp is having server problems. Manually subscribe this pereon: $email",
      "From: Mailchimp form " . $admin_email );
      $is_error = "yes";
    } else {
      $is_error = "no";
    }
?>
