<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Team Information</title>
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

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ipl";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $search = "";

    // Check if the form has been submitted
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sql_select = "SELECT * FROM each_team WHERE team_name='DC' AND player_name LIKE '%$search%'";
    } else {
        $sql_select = "SELECT * FROM each_team WHERE team_name='DC'";
    }

    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        echo "<h2>DC Team Information</h2>";
        echo "<form method='GET' action=''>
                <input type='text' name='search' placeholder='Search by Player Name' value='$search'>
                <input type='submit' value='Search'>
            </form>";
        echo "<table>";
        echo "<tr>
                <th>Player Name</th>
                <th>Role</th>
                <th>Country</th>
                <th>Batting Style</th>
                <th>Bowling Style</th>
            </tr>";

        while ($row = $result_select->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["player_name"]}</td>
                    <td>{$row["role"]}</td>
                    <td>{$row["country"]}</td>
                    <td>{$row["batting_style"]}</td>
                    <td>{$row["bowling_style"]}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Player not found</h2>";
    }

    // Back Button
    echo "<a href='ueachteam.html' class='back-btn'>Back to Home</a>";

    // Close the connection
    $conn->close();
    ?>

</body>

</html>
