<script>
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>


<?php 
if(isset($_GET['me'])){
  if($_GET['me']<>''){
    $right_answer=preg_replace('/[^0-9]/', '', $_GET['m']);
  }else{
    $right_answer=0;
  }
}else{
  $right_answer=0;
}
if($right_answer>1){
    $ss='s';
}else{
    $ss='';
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allan">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat Brush">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel Decorative">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dokdo">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Faster One">
<style>
    
    /* center the container */
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* style the header */
    h1 {
        font-size: 48px;
        font-weight: bold;
        text-shadow: 2px 2px #222831;
        color: #6c7ae0;
        font-family: "Caveat Brush", sans-serif;
    }

    /* style the input fields */
    input[type="text"] {
        padding: 12px 20px;
        font-size: 18px;
        border-radius: 10px;
        border: none;
        box-shadow: 2px 2px #222831;
        width: 300px;
        transition: all 0.3s ease;
        text-align:center;
        font-family: "Audiowide", sans-serif;
        background-color:#ccffcc;
    }

    /* add hover effect to input fields */
    input[type="text"]:hover {
        background-color: #f1f1f1;
        color: #222831;
        cursor: pointer;
    }

    /* style the subheader */
    h3 {
        font-size: 24px;
        font-weight: 300;
        color: #f8f8f8;
    }
    p {
        color:black;
        font-family: "Cinzel Decorative",sans-serif;
        margin:0;
    }
#gradient {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, #ff0000, #ffff00, #00ff00);
    z-index:-1;
}

</style>
<script>
    function twistGradient(e) {
    var gradient = document.getElementById("gradient");
    var x = e.clientX;
    var y = e.clientY;
    var centerX = window.innerWidth / 2;
    var centerY = window.innerHeight / 2;
    var angle = Math.atan2(y - centerY, x - centerX);
    var angleDeg = angle * (180 / Math.PI);
    gradient.style.background = "linear-gradient(" + angleDeg + "deg, #ff0000, #ffff00, #00ff00)";
}

</script>
<body onmousemove="twistGradient(event)">
<div id="gradient"></div>
<div class="container">
    <center>
    <style>
input[type="submit"]:hover {
  background-color: #ff0000; /* red */
  color: #ffffff; /* white */
  transform: scale(1.1); /* increase size on hover */
}
input[type="submit"] {
    background-color: #ff661a; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 36px;
margin: 4px 2px;
cursor: pointer;
border-radius: 12px;
  font-family:"Dokdo",sans-serif;
}
#backk:hover {
  background-color: #ff0000; /* red */
  color: #ffffff; /* white */
  transform: scale(1.1); /* increase size on hover */
}
#backk{
    background-color: #ff661a; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 36px;
margin: 4px 2px;
cursor: pointer;
border-radius: 12px;
  font-family:"Dokdo",sans-serif;
}
</style>
        <h1>Congratulations, You Have Answered <?php echo $_GET['m'] ?> Question<?php echo $ss ?> Correctly</h1>

<center>
<div class="table-container">
  <table class="cool-table">
    <thead>
      <tr>
        <th><b>Rank</b></th>
        <th><b>Name</b></th>
        <th><b>Class</b></th>
        <th><b>Right Answer</b></th>
      </tr>
    </thead>
    <tbody>
    <?php
$conn = mysqli_connect("localhost", "root", "", "matw");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT nama, kelas, nilai FROM nilai ORDER BY nilai DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$row_number=0;
$berapa=999999;
while($row = $result->fetch_assoc()) {
if($row["nilai"]<$berapa){
  $row_number++;
  $berapa=$row["nilai"];
}else{
    $row_number=$row_number;
}
    echo "<tr><td>" . $row_number. "</td><td>" . $row["nama"] . "</td><td>".$row["kelas"]." </td><td>".$row["nilai"]."</td></tr>";

}
if($result->num_rows == 1){
echo "<tr></tr><tr></tr>";
}
if($result->num_rows == 2){
    echo "<tr></tr>";
    }
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
    </tbody>
  </table>
</div>

</center>
</body>
<style>
.table-container {
    display: flex;
    align-items: center;
    justify-content: center;
}
.cool-table {
    font-family: "Allan", sans-serif;
    width: 80%;
    margin: 20px 0;
    border-collapse: collapse;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    border-radius:10px;
    background-color: #222831;
    color:white;
}
.cool-table th,
.cool-table td {
    padding: 20px;
    text-align: center;
    font-weight: 300;
    font-size: 18px;
    text-shadow: 1px 1px rgba(0, 0, 0, 0.1);
}
.cool-table thead th {
    background-color: #6c7ae0;
}
.cool-table tbody tr:first-child {
    background-color: #ffd700;
    color:black;
    font-family:"Faster One",sans-serif;
}
.cool-table tbody tr:nth-child(2) {
    background-color: #C0C0C0;
    color:black;
    font-family:"Faster One",sans-serif;
}
.cool-table tbody tr:nth-child(3) {
    background-color: #8B5E3C;
    color:black;
    font-family:"Faster One",sans-serif;
}
.cool-table tbody tr:not(:first-child):not(:nth-child(2)):not(:nth-child(3)):nth-child(odd) {
    background-color: #f8f8f8;
    color:black;
}
.cool-table tbody tr:not(:first-child):not(:nth-child(2)):not(:nth-child(3)):nth-child(even):hover {
    background-color: #b1a1a1;
    transition: background-color 0.3s ease;
    color:black;
}
.cool-table thead th {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.cool-table tbody tr:last-child td {
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.cool-table tbody tr:not(:first-child):not(:nth-child(2)):not(:nth-child(3)):nth-child(odd):hover {
    background-color: #b1d2d3;
    transition: background-color 0.3s ease;
    color:black;
}




</style>
