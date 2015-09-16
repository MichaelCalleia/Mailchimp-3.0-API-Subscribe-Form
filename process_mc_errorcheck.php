<?php

// Let's check for errors:
  // 400-series errors (code 400-499) indicate a bad request. Do not retry without fixing this error first.
    if ($user_status >= 400 && $user_status <= 499 && $user_status != 404) {
      // Get Data to send error alertemail
      $message = "Your Mailchimp subscription form is broken. Manually subscribe this pereon: ";
      // Send error alert message
      mail( $admin_email, "Mailchimp form is FUBAR!",
      "Message: $message\nEmail: $email\n",
      "From: Mailchimp form ".$admin_email );
      $is_error = "yes";
  // IF 500-series errors (500-599), Mailchimp server error, tell user to try again later or store and retry later with chron or some other trigger.
    } elseif ($user_status >= 500 && $user_status <= 599) {
      // Get Data to send error alertemail
      $message = "Mailchimp is having server problems. Manually subscribe this pereon: ";
      // Send error alert message
      mail( $admin_email, "Mailchimp servers are DOWN!",
      "Message: $message\nEmail: $email\n",
      "From: Mailchimp form ".$admin_email );
      $is_error = "yes";
    }
?>
