<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Schedule</title>
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

    <h2>Match Schedule</h2>

    

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ipl";

    $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $match_number = $_POST["match_number"];
        $match_date = $_POST["match_date"];
        $team1 = $_POST["team1"];
        $team2 = $_POST["team2"];
        $venue = $_POST["venue"];

        $sql_insert = "INSERT INTO schedule (match_number, match_date, team1, team2, venue) VALUES ('$match_number', '$match_date', '$team1', '$team2', '$venue')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<p>Match added successfully!</p>";
        } else {
            echo "<p>Error adding match: " . $conn->error . "</p>";
        }
    }

    $sql_select = "SELECT * FROM schedule";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>Match Number</th>
                <th>Date</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Venue</th>
            </tr>";

        while ($row = $result_select->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["match_number"]}</td>
                    <td>{$row["match_date"]}</td>
                    <td>{$row["team1"]}</td>
                    <td>{$row["team2"]}</td>
                    <td>{$row["venue"]}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No schedule found.</p>";
    }

    $conn->close();
    ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="match_number">Match Number:</label>
        <input type="number" name="match_number" required>
        <label for="match_date">Match Date:</label>
        <input type="date" name="match_date" required>
        <label for="team1">Team 1:</label>
        <input type="text" name="team1" required>
        <label for="team2">Team 2:</label>
        <input type="text" name="team2" required>
        <label for="venue">Venue:</label>
        <input type="text" name="venue" required>
        <input type="submit" name="submit" value="Add Match">
    </form>
    <a href='admin1st.html' class='back-btn'>Back to Admin Home</a>
</body>

</html>
