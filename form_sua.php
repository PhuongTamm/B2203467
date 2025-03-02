<!DOCTYPE HTML> 
<html>  
<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "qlsv"; 
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); // Check connection 
if ($conn->connect_error) { 
 die("Connection failed: " . $conn->connect_error); } 

 $id = $_POST['id']; 
 $sql = "SELECT * FROM student WHERE id='$id'";
$result = $conn->query($sql); 
//$row = $result->fetch_assoc(); 
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Không tìm thấy dữ liệu";
    exit();
}
?> 
<body> 
<?php print_r($row)?> 
<form action="sua.php" method="post"> 
ID:<input type="text" name="id" value="<?php echo $row['id'];?>"><br> Name: <input type="text" name="fullname" value="<?php echo  $row['fullname'];?>"><br> 
E-mail: <input type="text" name="email" value="<?php echo  $row['email'];?>"><br> 
Birthday: <input type="date" name="birth" value="<?php echo  $row['Birthday'];?>"><br>
Chuyen nganh: 
<select name="major_id">
<?php
$sql_major = "SELECT id, name_major FROM major";
$result_major = $conn->query($sql_major);

if ($result_major->num_rows > 0) {
    while ($row_major = $result_major->fetch_assoc()) {
        $selected = isset($row['major_id']) && ($row_major['id'] == $row['major_id']) ? 'selected' : '';
        echo '<option value="' . $row_major['id'] . '" ' . $selected . '>' . $row_major['name_major'] . '</option>';
    }
} else {
    echo '<option value="">Không có dữ liệu</option>';
}
?>
</select>

<input type="submit"> 
</form> 
</body> 
</html> 
