<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "matw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$benar=$_GET['m'];
$name=$_GET['nama'];

$sql_u = "SELECT * FROM nilai WHERE nama='$name'";
$res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));


$sql = "UPDATE nilai SET nilai='$benar' WHERE nama='$name'";


if ($conn->query($sql) === TRUE) {
    $kkk=$_GET['m'];
    header("location:done.php?m=".$kkk);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>