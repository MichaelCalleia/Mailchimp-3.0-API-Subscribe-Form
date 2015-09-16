<?php

  // Get status from Mailchimp //

    // MailChimp API 3.0 URL for member status //
    // /3.0/lists/{$listid}/members/{$leid}
    $mc_url = "https://" . $datacent . ".api.mailchimp.com/3.0/lists/" . $listid . "/members/" . $leid;

    // create a new cURL resource
    $ch = curl_init();

    // Gete connection going //
    curl_setopt($ch, CURLOPT_URL, $mc_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.$mc_apikey));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // $json_data contains the output string
    $json_data = curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);

    // Get status from JSON //
    $json_data = json_decode(utf8_encode($json_data));
    $user_status = $json_data->status;

   ?>
