<?php


 
try {
  require "../config.php";
  require "../common.php";
if(isset($_POST['submit'])) {
 //create connection
$mysqli = new PDO($dsn, $username, $password, $options);
$sql = "SELECT * FROM sample WHERE id = :studentID";
$studentID = $_POST['stusearch'];
$stmt = $mysqli->prepare($sql);
$stmt -> bindParam(':studentID', $studentID, PDO::PARAM_STR);
$stmt -> execute();
$result = $stmt->fetchAll();
}
} catch (PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>

<?php include "templates/header.php" ?>
<div data-role ="main" class="ui-content">
<?php
if (isset($_POST['submit'])) {
  if ($result && $stmt->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table data-role="table" class="ui-responsive">
      <thead>
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Email Address</th>
  <th>Credits</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["stuname"]); ?></td>
<td><?php echo escape($row["email"]); ?></td>
<td><?php echo escape($row["stucredits"]); ?> </td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
  No results found.
  <?php }
} ?>

<h1>Find User By ID #</h1>
<div data-role="fieldcontain">
<form method="post" data-ajax="false">
 <label for="stuid">Id #:</label>
    <input type="text" name="stusearch" id="stusearch">
<script src="gethint.js"></script>
<script>
  $("#stusearch").keyup(function(){
    var str = $("input#stusearch").val();
console.log(str)
    showHint(str, "hints");
  });
</script>
<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
<div class="ui-grid-a">
      <div class = "ui-block-a">
        <input type="submit" name="submit" value="Submit"> 
      </div>
      <div class = "ui-block-b">
        <a href="crud.php" data-role="button" name="back" value="Back" data-theme="b">Back</a>
      </div>
</div>
<div id ="hints"></div>
</form>
</div>
</div>
<?php include "templates/footer.php" ?>

