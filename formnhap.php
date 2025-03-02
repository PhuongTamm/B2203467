<!DOCTYPE HTML> 
<html>  
<body> 
<form action="luu.php" method="post"> 
Name: <input type="text" name="name"><br> 
E-mail: <input type="text" name="email"><br> 
Birthday: <input type="date" name="birth"><br> 

Chuyen nganh: 
<select name="major_id">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name_major FROM major";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["id"] . '">' . $row["name_major"] . '</option>';
    }
} else {
    echo '<option value="">Không có dữ liệu</option>';
}

$conn->close();
?>
</select>

<input type="submit"> 
</form> 
</body> 
</html>
