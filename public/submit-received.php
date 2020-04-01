<!DOCTYPE html>
<?php
function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
     
        return true;
    } else {
	
        return false;
    }
}
$to = "jfletcher17@bristolcc.edu";
$return = " ";
$from_name = $_POST['custName'];    
$from_email = $_POST['custEmail'];
$subject = "Question from $from_name";
$message = $_POST['custMessage'];
$secure_check = sanitize_my_email($from_email);
if ($secure_check == false) {
    $return = "Invalid input try again";
} else { 
    mail($to, $subject, $message);
    $return = "Submission has been received";
}
?>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Thank You</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="https://kit.fontawesome.com/a512c70283.js" crossorigin="anonymous"></script>
</head>
<body>
<div data-role="page" id="submission" data-theme="a">
<div data-role="header"><h1>Thank you <?php echo $from_name ?></h1></div>
<div data-role="content">
<p><?php echo $return ?></p>
<a href="index2.html" data-role="button" data-theme="b" data-icon="arrow-l" data-ajax="false">Home</a>
</div>
<div data-role="footer">Footer</div>
<div>
</body>
</html>




