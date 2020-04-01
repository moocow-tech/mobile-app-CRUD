<?php
try {
  require "../config.php";
  require "../common.php";

  if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  }

  $mysqli = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM sample";

  $stmt = $mysqli->prepare($sql);
  $stmt->execute();

  $result = $stmt->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php" ?>
<?php if (isset($_POST['msg'])) : ?>
<?php echo ""; ?>
<?php endif; ?>
<div data-role="main" class="ui-content">
<table data-role="table" class="ui-responsive">
  <thead>
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Email Address</th>
  <th>Credits</th>
  <th></th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
	<td style="vertical-align:middle;"><?php echo escape($row["id"]); ?></td>
	<td style="vertical-align:middle;"><?php echo escape($row["stuname"]); ?></td>
	<td style="vertical-align:middle;"><?php echo escape($row["email"]); ?></td>
	<td style="vertical-align:middle;"><?php echo escape($row["stucredits"]); ?> </td>
	<td> <a href="delete-single.php?id=<?php echo escape($row["id"]); ?>" data-role="button" class="ui-shadow ui-btn"  data-transition="slidedown" name="back" value="Edit" data-theme="b" data-ajax="false">Delete</a>
</td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
</div>
<?php require "templates/footer.php" ?>