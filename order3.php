<html>
<head>

    <meta charset="utf-8"/>
    <meta name="description" content="E-Learning"/>
    <meta name="keywords" content="nutritional, food, health, gourmet, delivery "/>
    <meta name="author" content="Leo Chon, Bill Poulaki"/>

    <title>Nutrition-Art</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" media="screen" ></link>

</head>

<body class="order">
<?php
$servername = "php-nutritionart.rhcloud.com";
$username = "vassiliki";
$password = "09081987";
$dbname = "nutrition_art_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_ingredient,ingredient FROM allergentants";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        echo "id: " . $row["id_ingredient"]. " - Ingredient Name: " . $row["ingredient"]. "<br>";
    }
}
else
{
    echo "0 results!";
}
$conn->close();
?>
</body>

</html>