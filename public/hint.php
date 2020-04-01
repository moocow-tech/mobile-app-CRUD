<?php
try {
  require "../config.php";
  require "../common.php";

  if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  }
 //create connection
$mysqli = new PDO($dsn, $username, $password, $options);
$sql = "SELECT id FROM sample WHERE id like concat(:studentID, '%')";

$studentID = $_REQUEST['stusearch'];
$hint = "";
$stmt = $mysqli->prepare($sql);
$stmt -> bindParam(':studentID', $studentID, PDO::PARAM_STR);
$stmt -> execute();
$result = $stmt->fetchAll();
foreach ($result as $key => $row) {
if ($hint === "") {
    $hint = $row['id']; 
} else {
    $hint .= ", " . $row['id'];
}
}
echo $hint ==="" ? "no records to suggest" : "<p>" . $hint . "</p>";
} catch (PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>