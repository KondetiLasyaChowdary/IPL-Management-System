<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stadium Information</title>
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

        th, td {
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

        input, select {
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
    $con = mysqli_connect("localhost", "root", "", "ipl");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Update stadium information
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add"])) {
            $stadium_name = $_POST["stadium_name"];
            $capacity = $_POST["capacity"];
            $DOI = $_POST["DOI"];
            $board_name = $_POST["board_name"];
            $team = $_POST["team"];

            $query = "INSERT INTO stadium (stadium_name, capacity, DOI, board_name, team) VALUES ('$stadium_name', $capacity, '$DOI', '$board_name', '$team')";
            $result = mysqli_query($con, $query);

            if (!$result) {
                echo "<p>Error adding stadium information: " . mysqli_error($con) . "</p>";
            } else {
                echo "<p>Stadium information added successfully!</p>";
            }
        } elseif (isset($_POST["update"])) {
            $team = $_POST["team"];
            $capacity = $_POST["capacity"];
            $DOI = $_POST["DOI"];
            $board_name = $_POST["board_name"];
            $new_stadium_name = $_POST["new_stadium_name"];

            $query = "UPDATE stadium SET capacity=$capacity, DOI='$DOI', board_name='$board_name', stadium_name='$new_stadium_name' WHERE team = '$team'";
            $result = mysqli_query($con, $query);

            if (!$result) {
                echo "<p>Error updating stadium information: " . mysqli_error($con) . "</p>";
            } else {
                echo "<p>Stadium information updated successfully!</p>";
            }
        }
    }

    // Display stadium information
    $querySelect = "SELECT * FROM stadium";
    $resultSelect = mysqli_query($con, $querySelect);

    if (!$resultSelect) {
        echo "<p>Error fetching stadium information: " . mysqli_error($con) . "</p>";
    } else {
        if (mysqli_num_rows($resultSelect) > 0) {
            echo "<table>";
            echo "<tr><th>Stadium Name</th><th>Capacity</th><th>DOI</th><th>Board Name</th><th>Team's Stadium</th></tr>";

            while ($row = mysqli_fetch_assoc($resultSelect)) {
                echo "<tr><td>" . $row["stadium_name"] . "</td><td>" .
                    $row["capacity"] . "</td><td>" .
                    $row["DOI"] . "</td><td>" .
                    $row["board_name"] . "</td><td>" .
                    $row["team"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No stadium information available.</p>";
        }
    }
    

    // Close the connection
    mysqli_close($con);
    ?>

    <!-- Update Form -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <h2>Update Stadium Information</h2>
        <label for="team">Team:</label>
        <input type="text" name="team" required>
        <label for="new_stadium_name">New Stadium Name:</label>
        <input type="text" name="new_stadium_name" required>
        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" required>
        <label for="DOI">DOI:</label>
        <input type="date" name="DOI" required>
        <label for="board_name">Board Name:</label>
        <input type="text" name="board_name" required>
        <input type="submit" name="update" value="Update">
    </form>

    <!-- Add Form -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <h2>Add Stadium Information</h2>
        <label for="stadium_name">Stadium Name:</label>
        <input type="text" name="stadium_name" required>
        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" required>
        <label for="DOI">DOI:</label>
        <input type="date" name="DOI" required>
        <label for="board_name">Board Name:</label>
        <input type="text" name="board_name" required>
        <label for="team">Team's Stadium:</label>
        <input type="text" name="team" required>
        <input type="submit" name="add" value="Add">
    </form>

    <a href='admin1st.html' class='back-btn'>Back to Admin Home</a>
</body>

</html>
