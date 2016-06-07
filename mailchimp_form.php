<!DOCTYPE html>

<html lang="en-us">
	<head>
		<title>Mailchimp Form</title>

		<meta charset="utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">

		<link rel="stylesheet" href="mailchimp_css.css" />

	</head>

	<body>

		<!--Newsletter-->
		<section title="Newsletter" id="newsletter" class="signup">
			<h2>Sign Up for Our Newsletter</h2>
			<!-- Begin MailChimp Signup Form -->
			<div id="newsletter-form">
				<form id="mc-subscribe-form" name="mc-subscribe-form" class="validate" method="post" action="#" target="_blank">
					<fieldset id="mc_embed_signup">
						<p><input type="text" name="fname" class="required" placeholder="First name" required></p>
						<p><input type="text" name="lname" class="required" placeholder="Last name" required></p>
						<p><input type="email" name="email" class="required email" placeholder="Your email address" required></p>

						<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-subscribe" class="button"></div>
					</fieldset>
				</form>
			</div>
		</section>
		<!--End mc_embed_signup-->


		<!-- Begin JavaScript -->
		<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>

		<!--Forms-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
			<!--  validate contact form-->
			<script>
			jQuery(function() {
				jQuery('#mc-subscribe-form').validate({
					rules: {
							fname: {
								required: true,
								minlength: 2
							},
							lname: {
								required: true,
								minlength: 2
							},
						email: {
						required: true,
						email: true
						},
					},
					messages: {
							fname: {
								required: "Oh come on, I really need to know your name.",
								minlength: "Surely your name is longer than one character."
							},
							lname: {
								required: "I'm normally not formal, but what is your surname?",
								minlength: "Surely your name is longer than one character."
							},
						email: {
						required: "Hey, I need your email address so I know where to send the newsletter."
						},
					},

					// jquery form for submitting
					submitHandler: function(form) {
						jQuery('#mc-subscribe-form').hide();
						jQuery('#newsletter-form').append("<p class='inprogress'>Working on that for you.</p>");

						jQuery(form).ajaxSubmit({
							url: '/mc_ajax2/process_mc.php',

							success: function(responseText, statusText, xhr, $user_message) {
								jQuery('.inprogress').hide();
								// jQuery('#newsletter-form').append(responseText);
								jQuery('#newsletter-form').append("<p class='thanks'>" + responseText + "</p>");
							},

							error: function() {
								jQuery('.inprogress').hide();
								jQuery('#mc-subscribe-form').show();
								jQuery('#newsletter-form').append("<label class='error'>Oh my! Something is not working. Please try using <a href='http://eepurl.com/d5Nhb'>this Mail Chimp form.</a></label>");
								window.open('http://eepurl.com/d5Nhb', '_blank');
							}

						});

					}


				});
			});
	</script>
		<!--JS for Forms-->

		<!-- End JavaScript -->


	</body>
</html>
