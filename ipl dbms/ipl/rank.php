<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rank of Batsmen</title>
    <style>
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

        .back-btn {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .top-left-link {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>


    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ipl";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define the criteria for batsmen
    $batsman_criteria = "runs";

    // Get the top 10 batsmen with their team names
    $sql_select = "SELECT id, name, runs, team
                   FROM players
                   ORDER BY $batsman_criteria DESC
                   LIMIT 10";
    $result_batsmen = $conn->query($sql_select);

    // Display the results
    echo "<h2>Top 10 Batsmen</h2>";
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Runs</th>
            <th>Team</th>
        </tr>";
    while ($row = $result_batsmen->fetch_assoc()) {
        echo "<tr>
                <td>{$row["id"]}</td>
                <td>{$row["name"]}</td>
                <td>{$row["runs"]}</td>
                <td>{$row["team"]}</td>
            </tr>";
    }
    echo "</table>";

    echo "<a href='uplayers.php' class='back-btn'>Back to players list</a>";
   

    // Close the connection
    $conn->close();
    ?>

</body>
</html>
