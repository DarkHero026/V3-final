<?php require_once("header.php");


$pdo = new PDO('mysql:host=localhost;dbname=finalV', 'root', '');
$stmt = 'SELECT * FROM  klant_r';
$conn = $pdo->prepare($stmt);
$conn->execute();
$rows = $conn->fetchAll(PDO::FETCH_ASSOC);




?>
<button name="test">test</button>


<?php require_once("footer.php"); ?>