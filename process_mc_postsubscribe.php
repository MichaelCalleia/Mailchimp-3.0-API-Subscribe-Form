<?php

    include 'process_mc_settings.php';

// Signup new member to Mailchimp newsletter //

  // create JSON data for the chimp //
    $data = array(
        "email_address" => $email,
        "status"        => "pending",
        "merge_fields"  => array(
          'FNAME' => $fname,
          'LNAME' => $lname
        )
    );
    $json_data = json_encode($data);


    // MailChimp API 3.0 URL to subscribe a member //
    // /3.0/lists/{$listid}/members/
    $mc_url = "https://" . $datacent . ".api.mailchimp.com/3.0/lists/" . $listid . "/members/";

    // create a new cURL resource
    $ch = curl_init();

    // Gete connection going //
    curl_setopt($ch, CURLOPT_URL, $mc_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.$mc_apikey));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

    // $json_data contains the output string
    $json_data = curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);

    // Get status from JSON //
    $json_data = json_decode(utf8_encode($json_data));
    $user_status = $json_data->status;

    // echo json_encode($user_status);

   ?>
