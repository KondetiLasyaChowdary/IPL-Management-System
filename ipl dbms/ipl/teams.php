<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ipl";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add new team
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_team'])) {
    $team_name = $_POST['team_name'];
    $owner = $_POST['owner'];
    $city = $_POST['city'];
    $home_ground = $_POST['home_ground'];
    $coach = $_POST['coach'];

    $sql = "INSERT INTO teams (team_name, owner, city, home_ground, coach)
    VALUES ('$team_name', '$owner', '$city', '$home_ground', '$coach')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update team
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_team'])) {
    $team_name = $_POST['team_name'];
    $owner = $_POST['owner'];
    $city = $_POST['city'];
    $home_ground = $_POST['home_ground'];
    $coach = $_POST['coach'];

    $sql = "UPDATE teams SET owner='$owner', city='$city', home_ground='$home_ground', coach='$coach' WHERE team_name='$team_name'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Get all teams
$sql = "SELECT * FROM teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th>Team Name</th>
            <th>Owner</th>
            <th>City</th>
            <th>Home Ground</th>
            <th>Coach</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["team_name"] . "</td>
            <td>" . $row["owner"] . "</td>
            <td>" . $row["city"] . "</td>
            <td>" . $row["home_ground"] . "</td>
            <td>" . $row["coach"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
    
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Team Management</title>
    <style>
       /* Your CSS styles here */
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
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
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
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
    <h2>Add Team</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="team_name">Team Name:</label>
        <input type="text" id="team_name" name="team_name" required><br>
        <label for="owner">Owner:</label>
        <input type="text" id="owner" name="owner" required><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>
        <label for="home_ground">Home Ground:</label>
        <input type="text" id="home_ground" name="home_ground" required><br>
        <label for="coach">Coach:</label>
        <input type="text" id="coach" name="coach" required><br><br>
        <input type="submit" value="Add Team" name="add_team">
    </form>
    <h2>Update Team</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="team_name">Team Name:</label>
        <input type="text" id="team_name" name="team_name" required><br>
        <label for="owner">Owner:</label>
        <input type="text" id="owner" name="owner" required><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>
        <label for="home_ground">Home Ground:</label>
        <input type="text" id="home_ground" name="home_ground" required><br>
        <label for="coach">Coach:</label>
        <input type="text" id="coach" name="coach" required><br><br>
        <input type="submit" value="Update Team" name="update_team">
    </form>
  
<a href='admin1st.html' class='back-btn'>Back to Admin Home</a>
</body>
</html>
