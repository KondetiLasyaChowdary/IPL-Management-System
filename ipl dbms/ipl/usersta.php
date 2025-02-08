<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stadium Information</title>
    <style>
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
    // Back Button
echo "<a href='user1st.html' class='back-btn'>Back to Homepage</a>";

    // Close the connection
    mysqli_close($con);
    ?>   
</body>

</html>
