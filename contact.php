<?php
global $wpdb;
$table = $wpdb->prefix . "contact";
$charset_collate = $wpdb->get_charset_collate();
$sql = "CREATE TABLE IF NOT EXISTS $table (
    `id` mediumint(9) NOT NULL AUTO_INCREMENT,
    `firstname` text NOT NULL,
    `lastname` text NOT NULL,
    `email` text NOT NULL,
	`phone` text NOT NULL,
    `message` text NOT NULL,
UNIQUE (`id`)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

if ( isset( $_POST["contact_form"] ) && ($_POST["firstname"] != "") && ($_POST["lastname"] != "") && ($_POST["email"] != "") && ($_POST["phone"] != "") && ($_POST["message"] != "")) {
  $table = $wpdb->prefix."contact";

  $firstname = strip_tags($_POST["firstname"], "");
  $lastname = strip_tags($_POST["lastname"], "");
  $email = strip_tags($_POST["email"], "");
  $phone = strip_tags($_POST["phone"], "");
  $message = strip_tags($_POST["message"], "");

  $wpdb->insert(
    $table,
    array(
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
	  'phone' => $phone,
      'message' => $message
    )
  );
  $html = "<p>Your contact information <strong>$firstname</strong> recorded successfully. Thanks!!</p>";
  echo $html;
}

?>
<?php require('alerts.php'); ?>
        
<div class="mx-auto mt-5 col-10 col-md-8 col-lg-6">
	<form id="contactform" name="contactform" method="post">
	  <div class="form-group">
		<label for="firstname">First Name *</label>
		<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
		<div id="alert_firstname" class="errorMsg"></div>
	  </div>
	  <div class="form-group">
		<label for="lastname">Last Name *</label>
		<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
		<div id="alert_lastname" class="errorMsg"></div>
	  </div>
	  <div class="form-group">
		<label for="email">Email *</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		<div id="alert_email" class="errorMsg"></div>
	  </div>
	  <div class="form-group">
		<label for="email">Phone *</label>
		<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
		<div id="alert_phone" class="errorMsg"></div>
	  </div>
	  <div class="form-group">
		<label for="meassage">Message *</label>
		<input type="text" class="form-control" id="message" name="message" placeholder="Message">
		<div id="alert_message" class="errorMsg"></div>
	  </div>
	  <input type="button" class="btn btn-primary mt-3" name="contact_form" id="contact_form" value="submit" onClick="return regFormValidate();"/>
	</form>
</div>
