<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Schedule and Matches Played</title>
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

    // Display schedule
    $sql_select_schedule = "SELECT * FROM schedule";
    $result_select_schedule = $conn->query($sql_select_schedule);

    if ($result_select_schedule->num_rows > 0) {
        echo "<h2>Schedule</h2>";
        echo "<table>";
        echo "<tr>
                <th>Match Number</th>
                <th>Date</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Venue</th>
            </tr>";

        while ($row = $result_select_schedule->fetch_assoc()) {
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
        echo "<p>No schedule available.</p>";
    }

    // View matches played form
    echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
                <label for='match_no'>Enter Match Number:</label>
                <input type='number' name='match_no' required>
                <input type='submit' value='View Matches Played'>
            </form>";

    // Display matches played
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $match_no = $_POST["match_no"];
        $sql_select_matches_played = "SELECT * FROM matches_played WHERE match_no = '$match_no'";
        $result_select_matches_played = $conn->query($sql_select_matches_played);

        if ($result_select_matches_played->num_rows > 0) {
            echo "<h2>Matches Played for Match Number $match_no</h2>";
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

            while ($row = $result_select_matches_played->fetch_assoc()) {
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
            echo "<p>No matches played for Match Number $match_no.</p>";
        }
    }
    echo "<a href='user1st.html' class='back-btn'>Back to Home</a>";

    // Close the connection
    $conn->close();
    ?>

</body>

</html>
