<?php

// Get settings //
    include 'process_mc_settings.php';


    // Email cleamup and member ID (leid) //

      // Take email address from the form
      $email = "strip_tags($_POST['email'])";

      // Make email all lowercase
      $email = strtolower($email);

      // member ID, is email covert to md5
      $leid = md5($email);

    //  Take email first and last name from the form
    if (isset($_POST['fname']))
    {
      $fname = strip_tags($_POST['fname']);
    }
    if (isset($_POST['lname']))
    {
      $lname = strip_tags($_POST['lname']);
    }


  // Get status from Mailchimp //
  include 'process_mc_getstatus.php';


  // Now let's do something about the status //

    // First, check for errors //
    include 'process_mc_errorcheck.php';

     // IF 404, add new user as pending
        if ($user_status == 404) {
         // code to be executed if condition is true;
         include 'process_mc_postsubscribe.php';
         include 'process_mc_errorcheck.php';
   // OK no Errors, now do this...
     // IF unsubscribed, resubscribe them
       } elseif ($user_status== 'unsubscribed') {
         include 'process_mc_patch.php';
     // IF pending, set to subscribed
       } elseif ($user_status== 'pending') {
         include 'process_mc_patch.php';
   // That's all the ifs thans and elses—close it down!
       }

   ?>
