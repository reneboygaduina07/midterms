<html>
    <head>
        <style>
            table{
                border-collapse: collapse;
                width: 100%;
                color: #b35340;
                font-family: monospace;
                font-size: 25px;
                text-align: left;
                }
            th{
                background-color: #4b2b31;
                color: white;
            }
            tr:nth-child(even) {background-color: black}
            tr:nth-child(odd) {background-color: yellow}
</style>
</head>
<body bgcolor="white">

	  <form action="test_db.sql" method="POST">
            <button type="submit" name="download">Download</button>
        </form>
    
    </div>
<button type="submit">  <a href="home.php" >Go back to home</a> </button></center></h1>
<?php 
session_start();

if ( isset($_SESSION['username'])) {

 ?>
<?php
		$link_address = '#'; 
$conn = mysqli_connect("localhost", "root", "", "test_db");
		if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql2="SELECT id, username, activity, time FROM acts WHERE username='{$_SESSION['username']}'
ORDER BY time DESC;";
$result2 = $conn->query($sql2);
$sql1="SELECT id, username, activity, time FROM acts
ORDER BY time DESC;";
	$result = $conn->query($sql1);



		echo "<br/><h3></h3>";
		echo "<table>";
		
echo "<table border='3'>

<tr>

<th>Id</th>

<th>Username</th>

<th>Activity</th>

<th>Time</th>

</tr>";

if($_SESSION['username']==="ADMIN"){
	if ($result->num_rows > 0)
while($row = $result->fetch_assoc()) {

  echo "<tr>" ;
	echo  "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['username'] . "</td>";
	echo " <td>" . $row['activity'] . "</td>";
	echo " <td>" . $row['time'] . "</td>";
	"<tr";
 
}
}
	
else{
		if ($result2->num_rows > 0)
	while($row = $result2->fetch_assoc()) {

  echo "<tr>" ;
	echo  "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['username'] . "</td>";
	echo " <td>" . $row['activity'] . "</td>";
	echo " <td>" . $row['time'] . "</td>";
	"<tr";
 
}
}


		echo "</table>";

}
$conn->close();
?>