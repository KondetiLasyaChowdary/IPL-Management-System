<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches Played</title>
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

    // Display matches played
    $sql_select = "SELECT * FROM matches_played";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        echo "<h2>Matches Played</h2>";
        echo "<table>";
        echo "<tr>
                <th>Match Number</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Who Won Toss</th>
                <th>Inning 1</th>
                <th>Inning 2</th>
                <th>Who Won Match</th>
                <th>Man of the Match</th>
                <th>Most Runs</th>
                <th>Wickets by Player</th>
            </tr>";

        while ($row = $result_select->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["match_no"]}</td>
                    <td>{$row["team1"]}</td>
                    <td>{$row["team2"]}</td>
                    <td>{$row["who_won_toss"]}</td>
                    <td>{$row["inning1"]}</td>
                    <td>{$row["inning2"]}</td>
                    <td>{$row["who_won_match"]}</td>
                    <td>{$row["man_of_match"]}</td>
                    <td>{$row["most_runs"]}</td>
                    <td>{$row["wickets_by_player"]}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No matches played yet.</p>";
    }

    // Add match played form
    echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
                <label for='match_no'>Match Number:</label>
                <input type='number' name='match_no' required>
                <label for='team1'>Team 1:</label>
                <input type='text' name='team1' required>
                <label for='team2'>Team 2:</label>
                <input type='text' name='team2' required>
                <label for='who_won_toss'>Who Won Toss:</label>
                <input type='text' name='who_won_toss' required>
                <label for='inning1'>Inning 1:</label>
                <input type='text' name='inning1' required>
                <label for='inning2'>Inning 2:</label>
                <input type='text' name='inning2' required>
                <label for='who_won_match'>Who Won Match:</label>
                <input type='text' name='who_won_match' required>
                <label for='man_of_match'>Man of the Match:</label>
                <input type='text' name='man_of_match' required>
                <label for='most_runs'>Most Runs:</label>
                <input type='text' name='most_runs' required>
                <label for='wickets_by_player'>Wickets by Player:</label>
                <input type='text' name='wickets_by_player' required>
                <input type='submit' value='Add Match Played'>
            </form>";

    // Insert new match played
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $match_no = $_POST["match_no"];
        $team1 = $_POST["team1"];
        $team2 = $_POST["team2"];
        $who_won_toss = $_POST["who_won_toss"];
        $inning1 = $_POST["inning1"];
        $inning2 = $_POST["inning2"];
        $who_won_match = $_POST["who_won_match"];
        $man_of_match = $_POST["man_of_match"];
        $most_runs = $_POST["most_runs"];
        $wickets_by_player = $_POST["wickets_by_player"];

        $sql_insert = "INSERT INTO matches_played (match_no, team1, team2, who_won_toss, inning1, inning2, who_won_match, man_of_match, most_runs, wickets_by_player) VALUES ('$match_no', '$team1', '$team2', '$who_won_toss', '$inning1', '$inning2', '$who_won_match', '$man_of_match', '$most_runs', '$wickets_by_player')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<p>New match played added successfully.</p>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }
    echo "<a href='admin1st.html' class='back-btn'>Back to Admin Home</a>";
    // Close the connection
    $conn->close();
    ?>

</body>

</html>
