<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Player Information</title>
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

        /* Position the rank links in the top-right corner */
        .rank-links {
            position: fixed;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column;
        }

        .rank-links a {
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="rank-links">
        <a href="rank.php">Rank of Batsman</a>
        <a href="ballrank.php">Rank of Blower</a>
        <a href="allrank.php">Rank of Allrounder</a>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ipl";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Search player by name
    echo "<h2>Cricket Player Information</h2>";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
        if ($_POST["action"] == "search_player") {
            $player_name = $_POST["player_name"];
            $sql_search = "SELECT * FROM players WHERE name LIKE '%$player_name%'";
            $result_search = $conn->query($sql_search);

            if ($result_search->num_rows > 0) {
                echo "<h2>Search Results for Player '$player_name'</h2>";
                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>Name</th>
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
                echo "<p>No players found with the name '$player_name'.</p>";
            }
        }
    }

    // Display player information
    $sql_select = "SELECT * FROM players";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
      
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
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
      // Search player form
      echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>
      <input type='hidden' name='action' value='search_player'>
      <label for='player_name'>Search Player by Name:</label>
      <input type='text' name='player_name' required>
      <input type='submit' value='Search'>
  </form>";
} else {
echo "<p>No players found.</p>";
}

    // Back Button
echo "<a href='user1st.html' class='back-btn'>Back to  Home page</a>";

    // Close the connection
    $conn->close();
    ?>

</body>

</html>
