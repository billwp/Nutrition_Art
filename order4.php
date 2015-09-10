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
    $servername = "localhost";
    $username = "root";
    $password = "";
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
//////////////////////////////////////////////////////////

    $url = 'http://www.yummly.com/';
    $output = file_get_contents($url);
    //echo $output;
    $array1 = "";

    //$array1 = explode("y-grid-card animate has-image compact",$output);
    $array1 = explode("<h3",$output);
    $help = explode('<meta itemprop="url" content=',$array1[0]);
    $help = explode('>
  <meta itemprop="position"',$help[1]);
    for ($x = 1; $x <= 30; $x++) {
        echo "PROION:    " . $x . "----->" ;
        $array2 = explode("</h3>",$array1[$x]);
        //echo '<div class="y-grid-card animate has-image compact"';
        $array3 = explode(">",$array2[0]);
        $array4 = explode("<",$array3[2]);
        echo $array4[0];

        //echo "url =   " . $help[0];
        $output2 = file_get_contents($help[0]);
        $array2 = explode("yummlyfood:ingredients",$output2);
        for($i = 1; $i < count($array2); $i++)
        {
            $output2 = explode('"',$array2[$i]);
            echo " Ingredient " . $i . " = " . $output2[1];
            echo "<br>";
        }
        //next url
        $help = explode('<meta itemprop="url" content=',$array1[$x]);
        $help = explode('>
  <meta itemprop="position"',$help[1]);
        echo "<br>";
        /*echo $array1[$x];
        echo "???????????????????????????";
        $name = explode('<h3 class="y-title"><a href="',$array1[$x]);
        $name = explode(">",$name[1]);
        echo "==========NAME===========" . $name;*/
    }
    ///////////////////////////////////////////////////

///////////////////////////////////////////////////
    ?>
</body>

</html>