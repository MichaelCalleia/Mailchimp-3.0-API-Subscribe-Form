# Mailchimp-3.0-API-Subscribe-Form
Form with jQuery validation to subscribe new list members to a Mailchimp list using the Mailchimp 3.0 API. Includes checking for member status, as well as handling various member status results and errors.

## What it does
* Checks the status of the provided email address
* If the address is not subscribed, adds user as a "pending" member, triggering a confirmation email from Mailchimp
* If the address is already in pending, confirms the user and changes status to subscibed.
* If the user is already subscribed, nothing happens.
* If there is an error (script error, connection error or Mailchimp server error), an email is sent to the provided admin email address to add the user manually.
* If the address unsubscribed, it is resubscribed.
* If the email address has bounced in the past, nothing happens.

## The files provided include
* HTML and JS for the form
* PHP that powers most of the heavy lifting
* A sample CSS file

## Set-up
1. Download
2. Edit process_mc_settings.php (you need a Mailchimp account).
3. Edit or remove the css file as needed
That's about it.

## Helpful Mailchimp Info
* How to find your Mailchimp List ID http://kb.mailchimp.com/lists/managing-subscribers/find-your-list-id
* How to get a Mailchimp API Key http://kb.mailchimp.com/accounts/management/about-api-keys

## What's next?
Right now all status changes happen via PHP without AJAX, so feedback to the user is a bit lacking at this time. Working on adding AJAX callbacks now.


