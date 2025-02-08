<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Player Information</title>
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

    // Add player information
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
        if ($_POST["action"] == "add_player") {
            $name = $_POST["name"];
            $team=$_POST["team"];
            $type=$_POST["type"];
            $matches = $_POST["matches"];
            $runs = $_POST["runs"];
            $average_runs = $_POST["average_runs"];
            $strike_rate = $_POST["strike_rate"];
            $wickets = $_POST["wickets"];
            $avg_wickets = $_POST["avg_wickets"];
            $economy = $_POST["economy"];
            $best_batting=$_POST["best_batting"];
            $best_bowling=$_POST["best_bowling"];

            $sql_add = "INSERT INTO players (name, team,type,matches, runs, average_runs, strike_rate, wickets, avg_wickets, economy,best_batting,best_bowling) VALUES ('$name','$team','$type',$matches,$runs, $average_runs, $strike_rate, $wickets, $avg_wickets, $economy,$best_batting,'$best_bowling')";

            if ($conn->query($sql_add) === TRUE) {
                echo "<p>Player added successfully!</p>";
            } else {
                echo "<p>Error adding player: " . $conn->error . "</p>";
            }
        } elseif ($_POST["action"] == "delete_player" && isset($_POST["player_id"])) {
            $player_id = $_POST["player_id"];
            $sql_delete = "DELETE FROM players WHERE id = $player_id";

            if ($conn->query($sql_delete) === TRUE) {
                echo "<p>Player deleted successfully!</p>";
            } else {
                echo "<p>Error deleting player: " . $conn->error . "</p>";
            }
        } elseif ($_POST["action"] == "search_player" && isset($_POST["search_name"])) {
            $search_name = $_POST["search_name"];
            $sql_search = "SELECT * FROM players WHERE name LIKE '%$search_name%'";
            $result_search = $conn->query($sql_search);

            if ($result_search->num_rows > 0) {
                echo "<h2>Search Results</h2>";
                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>team</th>
                        <th>type</th>
                        <th>Matches</th>
                        <th>Runs</th>
                        <th>Average Runs</th>
                        <th>Strike Rate</th>
                        <th>Wickets</th>
                        <th>Average Wickets</th>
                        <th>Economy</th>
                        <th>best batting</th>
                        <th>best bowling</th>
                    </tr>";

                while ($row = $result_search->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row["id"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["team"]}</td>
                            <td>{$row["type"]}</td>
                            <td>{$row["matches"]}</td>
                            <td>{$row["runs"]}</td>
                            <td>{$row["average_runs"]}</td>
                            <td>{$row["strike_rate"]}</td>
                            <td>{$row["wickets"]}</td>
                            <td>{$row["avg_wickets"]}</td>
                            <td>{$row["economy"]}</td>
                            <td>{$row["best_batting"]}</td>
                            <td>{$row["best_bowling"]}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No players found with the name '{$search_name}'.</p>";
            }
        }
    }

    // Display player information
    $sql_select = "SELECT * FROM players";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        echo "<h2>Cricket Player Information</h2>";
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>team</th>
                <th>type</th>
                <th>Matches</th>
                <th>Runs</th>
                <th>Average Runs</th>
                <th>Strike Rate</th>
                <th>Wickets</th>
                <th>Average Wickets</th>
                <th>Economy</th>
                <th>best batting</th>
                <th>best bowling</th>
            </tr>";

        while ($row = $result_select->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["name"]}</td>
                    <td>{$row["team"]}</td>
                    <td>{$row["type"]}</td>
                    <td>{$row["matches"]}</td>
                    <td>{$row["runs"]}</td>
                    <td>{$row["average_runs"]}</td>
                    <td>{$row["strike_rate"]}</td>
                    <td>{$row["wickets"]}</td>
                    <td>{$row["avg_wickets"]}</td>
                    <td>{$row["economy"]}</td>
                    <td>{$row["best_batting"]}</td>
                    <td>{$row["best_bowling"]}</td>
                </tr>";
        }

        echo "</table>";

        // Add player form
        echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
                <input type='hidden' name='action' value='add_player'>
                <label for='name'>Name:</label>
                <input type='text' name='name' required>
                <label for='team'>Team:</label>
                <input type='text' name='team' required>
                <label for='type'>Type:</label>
                <input type='text' name='type' required>
                <label for='matches'>Matches:</label>
                <input type='number' name='matches' required>
                <label for='runs'>Runs:</label>
                <input type='number' name='runs' step='0.01' required>
                <label for='average_runs'>Average Runs:</label>
                <input type='number' name='average_runs' step='0.01' required>
                <label for='strike_rate'>Strike Rate:</label>
                <input type='number' name='strike_rate' step='0.01' required>
                <label for='wickets'>Wickets:</label>
                <input type='number' name='wickets' required>
                <label for='avg_wickets'>Average Wickets:</label>
                <input type='number' name='avg_wickets' step='0.01' required>
                <label for='economy'>Economy:</label>
                <input type='number' name='economy' step='0.01' required>
                <label for='economy'>best batting:</label>
                <input type='number' name='best_batting' >
                <label for='economy'>best bowling:</label>
                <input type='text' name='best_bowling' >
                <input type='submit' value='Add Player'>
            </form>";
            

        // Delete player form
        echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
        <input type='hidden' name='action' value='delete_player'>
        <label for='player_id'>Enter Player ID to Delete:</label>
       <input type='number' name='player_id' required>
       <input type='submit' value='Delete Player'>
       </form>";
       // Search player form
       echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
       <input type='hidden' name='action' value='search_player'>
        <label for='search_name'>Search Player by Name:</label>
        <input type='text' name='search_name' required>
        <input type='submit' value='Search'>
        </form>";
       } else {
       echo "<p>No players found.</p>";
        
        

    }
    
    // Back Button
echo "<a href='admin1st.html' class='back-btn'>Back to Admin Home</a>";

    // Close the connection
    $conn->close();
    ?>

</body>

</html>
