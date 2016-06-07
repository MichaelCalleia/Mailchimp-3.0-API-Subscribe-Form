<?php

// Get settings //
    include 'process_mc_settings.php';

  // Get status from Mailchimp //
    include 'process_mc_getstatus.php';


  // Now let's do something about the status //

    // First, check for errors //
    include 'process_mc_errorcheck.php';

     // IF 404, add new user as pending
        if ($user_status == 404) {
         // code to be executed if condition is true;
        //  echo 'Adding you right now.';
        //  echo '<br><br>';
         include 'process_mc_postsubscribe.php';
         include 'process_mc_errorcheck.php';
         if ($is_error != "yes") {
         echo 'You are now signed up for the newsletter. Check your email to confirm. Thank you.';
         }
   // OK no Errors, now do this...
     // IF subscribed, tell user they are all set
       } elseif ($user_status== 'subscribed') {
         echo 'You are already a member. Thank you.';
     // IF unsubscribed, resubscribe them
       } elseif ($user_status== 'unsubscribed') {
        //  echo 'You unsubscribed from this newletter in the past. I will fix that right up for you now.';
        //  echo '<br><br>';
         include 'process_mc_patch.php';
        //  echo 'All done, you are now subscribed. Thank you.';
         echo 'You are now subscribed. Thank you.';
     // IF pending, set to subscribed
       } elseif ($user_status== 'pending') {
        //  echo 'You are already a member, but you never clicked your confirmation email. I will fix that right up for you now.';
        //  echo '<br><br>';
         include 'process_mc_patch.php';
        //  echo 'All done, you are now subscribed. Thank you.';
        echo 'You are now subscribed. Thank you.';
     // IF cleaned, let the user know this email address is not valid —— let them sign up again?
       } elseif ($user_status== 'cleaned') {
        //  echo '<br><br>';
         echo 'This email address was signed up before, but something is wrong. Email sent to this address keeps bouncing, please check your spelling or provide a differnt email address.';
   // That's all the ifs thans and elses—close it down!
       }


       // Send the data back to the JS
       echo json_encode($user_message);



       // Let's prove this php script was hit and the JS passes data to it
       // Send New Newsletter Subscriber Message
         mail( "$admin_email", "New Newsletter Subscriber",
         "Newsletter sign up for: $fname $lname \nEmail: $email\n\n\nStatus: $user_status\n\nWere there any errors: $is_error",
         "From: Forms <$admin_email>" );

   ?>
