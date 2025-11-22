<?php
//add admin table to the database and insert two users with their hash passwords
$surverName = 'localhost';
$userName = 'root';
$password = '';

$conn = new mysqli($surverName, $userName, $password);
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}
$conn->select_db("donation");

$sql = "CREATE TABLE Admins (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL)
";
if ($conn->query($sql) === TRUE) {
    echo "Table Admins Created...";
} else {
    echo "Table Admins Creation failed: " . $conn->connect_error;
}


$user1 = "narmin";
$user1PlainPass = "nnn";
$user1HashPass = password_hash($user1PlainPass, PASSWORD_DEFAULT);
$user2 = "shavin";
$user2PlainPass = "sss";
$user2HashPass = password_hash($user1PlainPass, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO Admins(user, pass) VALUES (?, ?)");
$stmt->bind_param("ss", $user1, $user1HashPass);
if ($stmt->execute()) {
    echo "user 1 Inserted";
} else {
    echo "Insert failed for 1st user: " . $stmt->error;
}
$stmt = $conn->prepare("INSERT INTO Admins(user, pass) VALUES (?, ?)");
$stmt->bind_param("ss", $user2, $user2HashPass);
if ($stmt->execute()) {
    echo "user 2 Inserted";
} else {
    echo "Insert failed for 2nd user: " . $stmt->error;
}
$stmt->close();
