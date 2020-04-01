<?php

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
  try {
   $mysqli = new PDO($dsn, $username, $password, $options);
   
   $sample = [
     "id" => $_POST['id'],
     "stuname" => $_POST['stuname'],
     "email" => $_POST['email'],
     "stucredits" => $_POST['stucredits']
   ];

   $sql = "UPDATE sample
	   SET id = :id,
               stuname = :stuname,
               email =   :email,
               stucredits = :stucredits
           WHERE id = :id";
   $stmt = $mysqli->prepare($sql);
   $stmt->execute($sample);  
	header( "Location: update.php");
  } catch (PDOException $error) {
   echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $mysqli = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];

    $sql = "SELECT * FROM sample WHERE id = :id";
    $stmt = $mysqli->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $sample = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
   echo "Something went wrong";
   exit;
}
?>

<!DOCTYPE html>
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
<div data-role="page" data-dialog="true" data-theme="a">
<div data-role="header" data-theme="b">
		<h1>Edit</h1>
		</div>

<div data-role="main" class="ui-content">

<div data-role="popup" id="popupDialog" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px;">

    <div data-role="header" data-theme="a">
    <h1>Update Page?</h1>
    </div>
    <div role="main" class="ui-content">
        <h3 class="ui-title">Are you sure you want to update this page?</h3>
    <p>This action cannot be undone.</p>
<form method="post" data-ajax="false">
         <input type="submit" name="submit" value="Submit">     
        <a href="#" class="ui-btn ui-btn-b" data-rel="back">Cancel</a>
</form>
    </div>
</div>
  
<h2>Edit a user</h2>
<div data-role="fieldcontain">
<form method="post" data-ajax="false">
  <?php foreach ($sample as $key => $value) : ?>
    <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
     <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
<?php endforeach; ?>
     <div class="ui-grid-a">
      <div class = "ui-block-a">
       <input type="submit" name="submit" value="Submit">
      </div>
     <div class = "ui-block-b">
     <a href="update.php" data-role="button" name="back" value="Cancel" data-theme="b">Back</a>
     </div>
    </div>
</form>
</div>
</div>
</div>
</body>
</html>
