<?php

  require "../config.php";
  require "../common.php";

if(isset($_POST['submit'])) {
                 
 //create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$new_student = array(
  "id"         => "'" . $_POST['stuid'] . "'",
  "stuname"    => "'" . $_POST['stuName'] . "'",
  "email"      => "'" . $_POST['stuEmail'] . "'",
  "stucredits" =>	$_POST['stuCreds']
);

$sql = sprintf(
	"INSERT INTO %s (%s) values (%s)",
	"sample",
	implode(", ", array_keys($new_student)),
	implode(", ", array_values($new_student))
);
$mysqli->query($sql);
}

?>
<?php include "templates/header.php" ?>
<div data-role ="main" class="ui-content">
<h1>Create New Record</h1>
<h4>
<?php if (isset($_POST['submit']) && $mysqli) { ?>
<?php echo escape($_POST['stuName']); ?> successfully added.
<?php } ?>
</h4>
<div data-role="fieldcontain">
<form method = "post" data-ajax="false">
    <label for="stuid">Id #:</label>
    <input type="text" name="stuid" id="stuid">
    <label for="stuName">Name:</label>
    <input type="text" name="stuName" id="stuName">
    <label for="stuEmail">Email:</label>
    <input type="text" name="stuEmail" id="stuEmail">
    <label for="stuCreds">Number of Credits:</label>
    <input type="text" name="stuCreds" id="stuCreds">
<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <div class="ui-grid-a">
      <div class = "ui-block-a">
        <input type="submit" name="submit" value="Submit"> 
      </div>
      <div class = "ui-block-b">
        <a href="crud.php" data-role="button" name="back" value="Back" data-theme="b">Back</a>
      </div>
    </div>
</form>
</div>
</div>
 
<?php include "templates/footer.php" ?>