<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
        .back-btn {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ipl";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Display match information for all teams
$sql = "SELECT * FROM matches";
$result = $conn->query($sql);

echo "<h2>Match Information for All Teams</h2>";
echo "<table>";
echo "<tr><th>Team Name</th><th>Matches</th><th>Wins</th><th>Winning Percentage (%)</th><th>Lost</th><th>Tied</th><th>Total Points</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row["team_name"]}</td>";
    echo "<td>{$row["matches"]}</td>";
    echo "<td>{$row["wins"]}</td>";
    echo "<td>{$row["winning_percentage"]}</td>";
    echo "<td>{$row["lost"]}</td>";
    echo "<td>{$row["tied"]}</td>";
    echo "<td>{$row["total_points"]}</td>";
    echo "</tr>";
}

echo "</table>";
// Back Button
echo "<a href='user1st.html' class='back-btn'>Back to  Homepage </a>";

// Close the connection
$conn->close();
?>

</body>
</html>
