<?php

// SETTINGS //

  // Admin email address to manually add subscribers in the event of an error //
    $admin_email = '{yourAdminEmailAddress}';


  // Your Mailchimp account info //

    // Data Center
    $datacent = '{MailchimpDomain}'; // Set to your data center

    // List ID
    $listid = '{MailchimpListID}'; // Set to your List ID

    // API key
    $mc_apikey = '{MailchimpAPIKey}'; // Set to your API key

// That's it for settings //


  // Email cleamup and member ID (leid) //

      // Take email address from the form
      if (isset($_POST['email']))
      {
        $email = strip_tags($_POST['email']);
      } else {
        exit;
      }

      // Make email all lowercase
      $email = strtolower($email);

      // member ID, is email covert to md5
      $leid = md5($email);

      //  Take email first and last name from the form
      if (isset($_POST['fname']))
      {
        $fname = strip_tags($_POST['fname']);
      } else {
        $fname = "";
      }
      if (isset($_POST['lname']))
      {
        $lname = strip_tags($_POST['lname']);
      }else {
        $lname = "";
      }

// Set Error Flag to no
      $is_error = "no";

// Initalize status variables
      $user_message = "";
      $user_status = "";

?>
