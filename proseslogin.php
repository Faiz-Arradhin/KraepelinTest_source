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
$name = $_POST['name'];
$class = $_POST['kelas'];

$sql_u = "SELECT * FROM nilai WHERE nama='$name'";
$res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));

if(mysqli_num_rows($res_u)>0){
    echo"<div align='center'>Job Name Sudah Pernah Terdaftar<a href='login.php'>Back</a></div>";
} else{
    if($name=="" OR $class==""){
        if ($name==""){
        echo"<div align='center'>Nama Kosong<a href='login.php'>Back</a></div>";
        }
        if ($class==""){
        echo"<div align='center'>Kelas Kosong<a href='login.php'>Back</a></div>";
        }
    }else{
$sql = "INSERT INTO nilai (nama, kelas)
VALUES ('$name', '$class')"; 

if ($conn->query($sql) === TRUE) {
    header("Location: koran.php?nama=" . $name . "&kelas=" . $class);

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
$conn->close();
?>