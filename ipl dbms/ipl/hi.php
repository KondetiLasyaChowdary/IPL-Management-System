<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Cricket Captains</title>
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
            background-color: #fff;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
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

// Update captain information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "update_confirm" && isset($_POST["update_captain_id"])) {
            $captain_id = $_POST["update_captain_id"];
            $new_name = $_POST["new_name"];
            $new_country = $_POST["new_country"];

            $sql = "UPDATE captains SET name='$new_name', country='$new_country' WHERE id = $captain_id";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Captain updated successfully!</p>";
            } else {
                echo "<p>Error updating captain: " . $conn->error . "</p>";
            }
        } elseif ($_POST["action"] == "add_captain") {
            $captain_name = $_POST["captain_name"];
            $captain_team = $_POST["captain_team"];
            $captain_country = $_POST["captain_country"];

            $sql = "INSERT INTO captains (name, team, country) VALUES ('$captain_name', '$captain_team', '$captain_country')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>New captain added successfully!</p>";
            } else {
                echo "<p>Error adding captain: " . $conn->error . "</p>";
            }
        }
    }
}

// Display list of captains
$sql = "SELECT * FROM captains";
$result = $conn->query($sql);

echo "<h2>List of IPL Captains</h2>";
echo "<table>";
echo "<table>";
        echo "<tr><th> Name</th><th>Team</th><th>Country</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row["name"]}</td> 
    <td>{$row["team"]}</td>
    <td>{$row["country"]}<td>
    </tr>";
}
echo "</table>";

// Update Captain Form
echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
        <h2>Update Captain</h2>
        <label for='update_captain_id'>Select Captain to Update:</label>
        <select name='update_captain_id'>";
$result = $conn->query("SELECT id, name FROM captains");
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row["id"]}'>{$row["name"]}</option>";
}
echo "</select><br>
        <label for='new_name'>New Name:</label>
        <input type='text' name='new_name' required><br>
        <label for='new_country'>New Country:</label>
        <input type='text' name='new_country' required><br>
        <input type='hidden' name='action' value='update_confirm'>
        <input type='submit' value='Update Captain'>
      </form>";

// Add New Captain Form
echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
        <h2>Add New Captain</h2>
        <label for='captain_name'>Name:</label>
        <input type='text' name='captain_name' required><br>
        <label for='captain_team'>Team:</label>
        <input type='text' name='captain_team' required><br>
        <label for='captain_country'>Country:</label>
        <input type='text' name='captain_country' required><br>
        <input type='hidden' name='action' value='add_captain'>
        <input type='submit' value='Add Captain'>
      </form>";

// Back Button
echo "<a href='admin1st.html' class='back-btn'>Back to Admin Home</a>";

// Close the connection
$conn->close();
?>

</body>
</html>
