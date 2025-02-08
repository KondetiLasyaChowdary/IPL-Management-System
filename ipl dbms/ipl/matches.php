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

// Update match information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "update_match" && isset($_POST["team_name"])) {
            $team_name = $_POST["team_name"];
            $matches = $_POST["matches"];
            $wins = $_POST["wins"];
            $lost = $_POST["lost"];
            $tied = $_POST["tied"];

            // Calculate winning percentage and total points based on the provided formula
            $winning_percentage = ($wins / $matches) * 100;
            $total_points = ($wins * 2) + $tied;

            $sql = "UPDATE matches SET matches=$matches, wins=$wins, winning_percentage=$winning_percentage, lost=$lost, tied=$tied, total_points=$total_points WHERE team_name = '$team_name'";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Match information updated successfully!</p>";
            } else {
                echo "<p>Error updating match information: " . $conn->error . "</p>";
            }
        }
    }
}

// Display match information for all teams
$sql = "SELECT * FROM matches";
$result = $conn->query($sql);

echo "<h2>Match Information for All Teams</h2>";
echo "<table>";
echo "<tr><th>Team Name</th><th>Matches</th><th>Wins</th><th>Winning Percentage (%)</th><th>Lost</th><th>Tied</th><th>Total Points</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row["team_name"]}</td>";
    echo "<td>{$row["matches"]}</td>";
    echo "<td>{$row["wins"]}</td>";
    echo "<td>{$row["winning_percentage"]}</td>";
    echo "<td>{$row["lost"]}</td>";
    echo "<td>{$row["tied"]}</td>";
    echo "<td>{$row["total_points"]}</td>";
    echo "<td>
              <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                  <input type='hidden' name='team_name' value='{$row["team_name"]}'>
                  <input type='hidden' name='action' value='update_match'>
                  <label for='matches'>Matches:</label>
                  <input type='number' name='matches' value='{$row["matches"]}' required>
                  <label for='wins'>Wins:</label>
                  <input type='number' name='wins' value='{$row["wins"]}' required>
                  <label for='lost'>Lost:</label>
                  <input type='number' name='lost' value='{$row["lost"]}' required>
                  <label for='tied'>Tied:</label>
                  <input type='number' name='tied' value='{$row["tied"]}' required>
                  <input type='submit' value='Update'>
              </form>
          </td>";
    echo "</tr>";
}

echo "</table>";
// Back Button
echo "<a href='admin1st.html' class='back-btn'>Back to Admin Home</a>";

// Close the connection
$conn->close();
?>

</body>
</html>
