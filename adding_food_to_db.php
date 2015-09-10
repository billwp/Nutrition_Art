<html>
<head>

    <meta charset="utf-8"/>
    <meta name="description" content="E-Learning"/>
    <meta name="keywords" content="nutritional, food, health, gourmet, delivery "/>
    <meta name="author" content="Leo Chon, Bill Poulaki"/>

    <title>Nutrition-Art</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" media="screen"/>

</head>

<body class="order">
<?php
//////////////////////////connection to db/////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$db = "nutrition_art_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "Succesfully connected!!!";
}
/////////////////////////retrieving data/////////////////////////////////

$url = 'http://www.yummly.com/recipe/Chicken-Cacciatore-1291934?columns=4&position=22%2F37';
$output = file_get_contents($url);
//echo $output;
$array1 = "";

echo " INGREDIENTS: ";
$ingredients = "";
echo "<br>";
$array1 = explode('<meta property="yummlyfood:ingredients" content=',$output);
for($i = 1;$i < count($array1) - 1; $i++)
{
    $help = explode('>',$array1[$i]);
    $ingredients[$i-1] = chop($help[0]);
    echo $help[0] ."   ===>   ". $ingredients[$i - 1];
    echo "<br>";
}
$help = explode('"yummlyfood:time" content="',$array1[count($array1) - 1]);
$array1 = explode('>',$help[0]);
$ingredients[$i-1] = chop($array1[0]);
echo $array1[0] ."   ==>   ".$ingredients[$i-1];
echo "<br>";
$array1 = explode('name="description"',$help[1]);
$help = explode('"',$array1[0]);
echo "<br>";
$time = explode("min",$help[0]);
$time  = (int)chop($time[0]);
echo "Time to be ready: ". $help[0]." => ".$time;
echo "<br>";
$help = explode('property="og:description"',$array1[1]);
$array1 = explode('"',$help[0]);
echo "<br>";
$food_description = chop($array1[1]);
echo "Description: ". $array1[1]." => ".$food_description;
echo "<br>";
$array1 = explode('<h1 itemprop="name" title=',$help[1]);
//echo "mikos: " . count($array1);
$help = explode('attribution definition has-added-by',$array1[1]);
$array1 = explode('</h1>',$help[0]);
$help1 = explode('>',$array1[0]);
echo "<br>";
$food_name = chop($help1[1]);
echo " Name:   " . $help1[1]." => ".$food_name;
echo "<br>"."<br>"."sustatika"."<br>" ;
$array1 = explode('<b>Calories</b>',$help[1]);
$help = explode('itemprop="fatContent">',$array1[1]);
$help1 = explode(' itemprop="calories">',$help[0]);
$array1 =explode('</span>',$help1[1]);
$calories =  (int)chop($array1[0]);
echo "Calories: " . $array1[0]." => ".$calories;
echo "<br>";
$array1 = explode('itemprop="saturatedFatContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$total_fat = (int)chop($help1[0]);
$total_fat_per = (int)chop($percentage[0]);
echo "Total Fat: " . $help1[0] ." kai se pososto:.". $percentage[0] ." => ".$total_fat;
echo "<br>";
$help = explode('<i>Trans Fat</i>',$array1[1]);
$help1 =explode('</span>',$help[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$satured_fat = (int)chop($help1[0]);
$satured_fat_per = (int)chop($percentage[0]);
echo "Saturated Fat" , $help1[0] ."kai pososto ". $percentage[0]." => ".$satured_fat;
echo "<br>";
$help = explode('itemprop="cholesterolContent">',$help[1]);
$help1 = explode('<td class="percentage">',$help[0]);
$percentage = explode('</td>',$help1[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$trans_fat = (int)chop($percentage[0]);
echo "Trans Fat" ."mono se pososto ". $percentage[0]." => ".$trans_fat;
echo "<br>";
$array1 = explode('itemprop="sodiumContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$cholesterol = (int)chop($help1[0]);
$cholesterol_per = (int)chop($percentage[0]);
echo "Cholesterol" , $help1[0]." pososto " . $percentage[0] ." => ". $cholesterol;
echo "<br>";
$help = explode('<b>Potassium</b>',$array1[1]);
$help1 = explode('</span>',$help[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$sodium = (int)chop($help1[0]);
$sodium_per = (int)chop($percentage[0]);
echo "Sodium" , $help1[0]." pososto ".$percentage[0]. " => ".$sodium;
echo "<br>";
$array1 = explode('itemprop="carbohydrateContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$potassium = (int)ltrim(chop($help1[0]));
$potassium_per = (int)chop($percentage[0]);
echo "Potassium" , $help1[0]." kai pososto ".$percentage[0] ." => ". $potassium;
echo "<br>";
$help = explode('itemprop="fiberContent">',$array1[1]);
$help1 = explode('</span>',$help[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$total_carbo = (int)chop($help1[0]);
$total_carbo_per = (int)chop($percentage[0]);
echo "Total Carbohydrate" , $help1[0] . " pososto ".$percentage[0]." => ".$total_carbo;
echo "<br>";
$array1 = explode('itemprop="sugarContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$dietary_fiber = (int)chop($help1[0]);
$dietary_fiber_per = (int)chop($percentage[0]);
echo "Dietary Fiber" , $help1[0] . " pososto " .$percentage[0]." => ".$dietary_fiber;
echo "<br>";
$array1 = explode('itemprop="proteinContent">',$array1[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
$sugars = (int)chop($help1[0]);
echo "Sugars" , $help1[0]." pososto " . $percentage[0]." => ".$sugars;
echo "<br>";
$help = explode('class="child">Vitamin A',$array1[1]);
$help1 = explode('</span>',$help[0]);
$protein = (int)chop($help1[0]);
echo "Protein" . $help1[0]. " => ".$protein;
echo "<br>";
$help = explode('class="child">Vitamin C',$array1[1]);
$help1 = explode('class="percentage">',$help[0]);
$array1 = explode('%',$help1[1]);
$vitaminA =  (int)chop($array1[0]);
echo "Vitamin A" , $array1[0]." => ".$vitaminA;
echo "<br>";
$array1 = explode('class="child">Calcium',$help[1]);
$help1 = explode('class="percentage">',$array1[0]);
$help= explode('%',$help1[1]);
$vitaminC = (int)chop($help[0]);
echo "Vitamin C" , $help[0] ." => ".$vitaminC;
echo "<br>";
$help = explode('class="child">Iron',$array1[1]);
//echo "length " . count($array1) . $array1[0];
$help1 = explode('class="percentage">',$help[0]);
$array1 = explode('%',$help1[1]);
$calcium = (int)chop($array1[0]);
echo "Calcium" , $array1[0] . " => ".$calcium;
echo "<br>";
$help = explode('footnote',$help[1]);
//echo "length " . count($array1) . $array1[0];
$help1 = explode('class="percentage">',$help[0]);
$array1 = explode('%',$help1[1]);
$iron = (int)chop($array1[0]);
echo "Iron" , $array1[0]." => ".$iron;
echo "<br>"."<br>";
echo "* Percent Daily Values are based on a 2,000 calorie diet. Your Daily Values may be higher or lower depending on your calorie needs.";
//////////////calculate a random price and an idfood///////////////////////////////////////
$food_price = 1.25*mt_rand(1,9);
echo "<br>". "price = " . $food_price;
echo "<br>";
$food_id = 1;
echo "<br>". "if food = " . $food_id;
echo "<br>";
////////////////////////////////////////////////////////////////////////////////
/////////////inserting noe thw values//////////////////////////////////////
$sql = "INSERT INTO food (picture, description,category, price,diet,calories,total_fat,total_fat_per,fat_saturated,fat_saturated_per,fat_trans,cholesterol,cholesterol_per,sodium,sodium_per,potassium,potassium_per,total_carbohydrate,total_carbohydrate_per,carbo_dietary_fiber,carbo_dietary_fiber_per,carbo_sugars,protein,vitamin_a_per,vitamin_c_per,calcium_per,iron_per,time)
			VALUES ('http://lh3.googleusercontent.com/7I32XVnf8wQE3srUHA2n5pzeXKTqD0o1_FW2a9-lKcnVlU94qBrFGXH9LlGM69cZXITgQ26woQBjkuxgbwi7uQ=s730-e365', '$food_description','dinner', '$food_price','meat','$calories','$total_fat','$total_fat_per','$satured_fat','$satured_fat_per','$trans_fat','$cholesterol','$cholesterol_per','$sodium','$sodium_per','$potassium','$potassium_per','$total_carbo','$total_carbo_per','$dietary_fiber','$dietary_fiber_per','$sugars','$protein','$vitaminA','$vitaminC','$calcium','$iron','$time');";

if ($conn->query($sql) === TRUE)
{
    echo "New record created successfully!!!!";
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/////////////////now the allergent.../////////////////////////
/*$sql = "SELECT ingredient FROM allergentants";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $myingre = $row["ingredient"];
        if(in_array($myingre,$ingredients))
        {
            //$sql2 = "UPDATE allerg_may.have_food SET route_id='$myroute'  WHERE day_id='$mydate'";
            "INSERT INTO allerg_may.have (id_ingredient,id_food)
			VALUES ('$myingre','$food_id')";

        }
    }

}*/
//<img itemprop="image"
//////////////////////////////////////////////////////////////////////////
/////////////closing connection////////////////////////////////
//$conn->close();
//////////////////////////////////////////////////
?>
</body>

</html>