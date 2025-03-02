<?php
//thong tin ket noi
$servername = "localhost";
$username = "root";
$password = "";
//tao ket noi
$conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        //hien thi loi neu ket noi khong duoc
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>


