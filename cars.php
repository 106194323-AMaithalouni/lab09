<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
</head>
<body>
    <h1>Used Cars</h1>
<?php
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p>Database connection failure.</p>";
} else {
    $query = "SELECT * FROM cars";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<p>Something is wrong with the query.</p>";
    } else if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Car ID</th>";
        echo "<th>Make</th>";
        echo "<th>Model</th>";
        echo "<th>Price</th>";
        echo "<th>Year</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "<p>There are no cars to display.</p>";
    }

    mysqli_close($conn);
}
?>
</body>
</html>