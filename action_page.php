<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "vhsinfotech@gmail.com";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>
<!DOCTYPE html>
<html>
<title>VHS INFOTECH PVT LTD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
 
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/mac.jpg");
  min-height: 100%;
}
.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="\vhsinfotech" class="w3-bar-item w3-button w3-wide">VHS INFOTECH PVT. LTD.</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="\vhsinfotech\about.html" class="w3-bar-item w3-button">ABOUT</a>
      <a href="\vhsinfotech\review.html" class="w3-bar-item w3-button"><i class="fa fa-user"></i> REVIEWS</a>
      <a href="\vhsinfotech\product.html" class="w3-bar-item w3-button"><i class="fa fa-th"></i> PRODUCTS</a>
      <a href="\vhsinfotech\offer.html" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> OFFERS</a>
      <a href="\vhsinfotech\contact.html" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="\vhsinfotech\about.html" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="\vhsinfotech\review.html" onclick="w3_close()" class="w3-bar-item w3-button">REVIEWS</a>
  <a href="\vhsinfotech\product.html" onclick="w3_close()" class="w3-bar-item w3-button">PRODUCTS</a>
  <a href="\vhsinfotech\offer.html" onclick="w3_close()" class="w3-bar-item w3-button">OFFERS</a>
  <a href="\vhsinfotech\contact.html" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>
    <!-- include your success message below -->
	<div class="w3-container w3-light-grey" style="padding:200px 16px" id="contact">
  <p class="w3-center w3-large">Thank you for contacting us. We will be in touch with you very soon.</p>
 </div>
 <!--Footer-->
<footer class="w3-center w3-black w3-padding-64">
  <a href="\vhsinfotech\contact.html" class="w3-button w3-light-grey"><i class="fa fa-arrow-left w3-margin-right"></i>Back to Website</a>
  <div class="w3-xlarge w3-section">
    <i class="fab fa-facebook w3-hover-opacity"></i>
	    <i class="fab fa-whatsapp w3-hover-opacity"></i>
    <i class="fab fa-instagram w3-hover-opacity"></i>
	<a href="https://www.linkedin.com/in/vhs-infotech-9aa99a1aa/"><i class="fab fa-linkedin w3-hover-opacity">
	</i>
  </a></div>
  <p>We acknowledge to have taken contents form respective Parent company websites for their respective product promotion only.
  We respect their trademarks, patents, web contents, etc.<br> 
  <a href="\vhsinfotech\contact.html" title="VHS INFOTECH PVT LTD" target="_blank" class="w3-hover-text-green">Contact us </a>for more details</p>
</footer>
<script>
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}


</script>
</body>
</html>
<?php
}
?>