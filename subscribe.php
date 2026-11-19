<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "constant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlCreateTable = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    project VARCHAR(255) NOT NULL,
    message TEXT
)";
$conn->query($sqlCreateTable);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'], $_POST['email'], $_POST['contact'], $_POST['project'], $_POST['txtMessage'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $contact = $conn->real_escape_string($_POST['contact']);
        $project = $conn->real_escape_string($_POST['project']);
        $message = $conn->real_escape_string($_POST['txtMessage']);

        $sql = "INSERT INTO subscribers (name, email, contact, project, message)
                VALUES ('$name', '$email', '$contact', '$project', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Thank you! Your inquiry has been submitted.'); window.location.href='index.html';</script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "One or more form fields are missing.";
    }
}
$conn->close();
?>
