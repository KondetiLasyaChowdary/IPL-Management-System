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





// Back Button
echo "<a href='user1st.html' class='back-btn'>Back to Home page</a>";

// Close the connection
$conn->close();
?>

</body>
</html>
