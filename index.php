<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= get_bloginfo( 'name' ); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>	
	
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="<?php echo get_option('siteurl'); ?>" class="navbar-brand">Contact Form Plugin</a>
        </div>
    </nav>
    <div>
		<?php include('contact.php'); ?>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function showLabelAlert(alertVal, id){
		$("#alert_"+id).html(alertVal);
	}
            var captchaBool = 0;
            function regFormValidate(){
				var returnVal=true;

				var contactFormName = document.contactform;
				$('div[id^="alert_"]').html('');
				if (contactFormName.firstname.value == "" || contactFormName.firstname.value == "First Name") {
					showLabelAlert('<?php echo ALERT_FIRSTNAME; ?>', 'firstname');
					returnVal= false;
				}
				if (contactFormName.lastname.value == "" || contactFormName.lastname.value == "Last Name") {
					showLabelAlert('<?php echo ALERT_LASTNAME; ?>', 'lastname');
					returnVal= false;
				}
				if (contactFormName.email.value == "" || contactFormName.email.value == "Email") {
					showLabelAlert('<?php echo ALERT_EMAIL; ?>', 'email');
					returnVal= false;
				}
				else if (contactFormName.email.value.indexOf("@", 0) < 0){
					showLabelAlert('<?php echo ALERT_VALID_EMAIL; ?>', 'email');
					returnVal= false;
				}
				else if (contactFormName.email.value.indexOf(".", 0) < 0){
					showLabelAlert('<?php echo ALERT_VALID_EMAIL; ?>', 'email');
					returnVal= false;
				}
				if (contactFormName.phone.value == "" || contactFormName.phone.value == "Phone") {
					showLabelAlert('<?php echo ALERT_PHONE; ?>', 'phone');
					returnVal= false;
				}
				if (contactFormName.message.value == "" || contactFormName.phone.value == "Message") {
					showLabelAlert('<?php echo ALERT_MESSAGE; ?>', 'message');
					returnVal= false;
				}
				if(returnVal==true){
					return true; 
				}
            }
            </script>
    <?php wp_footer(); ?>
  </body>
</html>