<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "constant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM subscribers WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "SELECT * FROM subscribers ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('img/log1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            background-color: #1e272e;
        }
        .admin-panel-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.92);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-panel-container shadow">
            <h2 class="text-center mb-4">Admin Panel - Client Inquiries</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Project</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["contact"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["project"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["message"]) . "</td>";
                            echo "<td><a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm("Delete this inquiry?")'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No inquiries found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>
