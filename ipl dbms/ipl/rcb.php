<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RCB Team Information</title>
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

    // Add player information
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
        if ($_POST["action"] == "add_player") {
            $team_name = "RCB";
            $player_name = $_POST["player_name"];
            $role = $_POST["role"];
            $country = $_POST["country"];
            $batting_style = $_POST["batting_style"];
            $bowling_style = $_POST["bowling_style"];

            $sql_add = "INSERT INTO each_team (team_name, player_name, role, country, batting_style, bowling_style) VALUES ('$team_name', '$player_name','$role', '$country', '$batting_style', '$bowling_style')";

            if ($conn->query($sql_add) === TRUE) {
                echo "<p>Player added successfully!</p>";
            } else {
                echo "<p>Error adding player: " . $conn->error . "</p>";
            }
        } elseif ($_POST["action"] == "delete_player" && isset($_POST["player_id"])) {
            $player_id = $_POST["player_id"];
            $sql_delete = "DELETE FROM each_team WHERE team_name='RCB' AND id = $player_id";

            if ($conn->query($sql_delete) === TRUE) {
                echo "<p>Player deleted successfully!</p>";
            } else {
                echo "<p>Error deleting player: " . $conn->error . "</p>";
            }
        } elseif ($_POST["action"] == "search_player" && isset($_POST["search_name"])) {
            $search_name = $_POST["search_name"];
            $sql_search = "SELECT * FROM each_team WHERE team_name='RCB' AND player_name LIKE '%$search_name%'";
            $result_search = $conn->query($sql_search);

            if ($result_search->num_rows > 0) {
                echo "<h2>Search Results</h2>";
                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>Player Name</th>
                        <th>role</th>
                        <th>Country</th>
                        <th>Batting Style</th>
                        <th>Bowling Style</th>
                    </tr>";

                while ($row = $result_search->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row["id"]}</td>
                            <td>{$row["player_name"]}</td>
                            <td>{$row["role"]}</td>
                            <td>{$row["country"]}</td>
                            <td>{$row["batting_style"]}</td>
                            <td>{$row["bowling_style"]}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No players found with the name '{$search_name}'.</p>";
            }
        }
    }

    // Display RCB team player information
    $sql_select = "SELECT id, player_name, role, country, batting_style, bowling_style FROM each_team WHERE team_name='RCB'";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        echo "<h2>RCB Team Information</h2>";
        echo "<table>";
        echo "<tr>
               <th>ID</th>
                <th>Player Name</th>
                <th>role</th>
                <th>Country</th>
                <th>Batting Style</th>
                <th>Bowling Style</th>
            </tr>";

        while ($row = $result_select->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["player_name"]}</td>
                    <td>{$row["role"]}</td>
                    <td>{$row["country"]}</td>
                    <td>{$row["batting_style"]}</td>
                    <td>{$row["bowling_style"]}</td>
                </tr>";
        }

        echo "</table>";

        // Add player form
        echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
                <input type='hidden' name='action' value='add_player'>
                <label for='player_name'>Player Name:</label>
                <input type='text' name='player_name' required>
                <label for='role'>role:</label>
                <input type='text' name='role' required>
                <label for='country'>Country:</label>
                <input type='text' name='country' required>
                <label for='batting_style'>Batting Style:</label>
                <input type='text' name='batting_style' required>
                <label for='bowling_style'>Bowling Style:</label>
                <input type='text' name='bowling_style' required>
                <input type='submit' value='Add Player'>
            </form>";

        // Delete player form
        echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
                <input type='hidden' name='action' value='delete_player'>
                <label for='player_id'>Delete Player by ID:</label>
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
        echo "<p>No players found for RCB.</p>";
    }

    // Back Button
    echo "<a href='each_team.html' class='back-btn'> Go Back </a>";

    // Close the connection
    $conn->close();
    ?>

</body>

</html>
