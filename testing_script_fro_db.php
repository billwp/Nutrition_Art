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
//////////////////////////////////////////////////////////

$url = 'http://www.yummly.com/recipe/Mexican-Turkey-Taco-Lettuce-Wraps-_Gluten-Free_-Dairy-Free_-1291561?columns=4&position=21%2F37';
$output = file_get_contents($url);
//echo $output;
$array1 = "";

echo " INGREDIENTS: ";
echo "<br>";
$array1 = explode('<meta property="yummlyfood:ingredients" content=',$output);
for($i = 1;$i < count($array1) - 1; $i++)
{
    $help = explode('>',$array1[$i]);
    echo $help[0] ;
    echo "<br>";
}
$help = explode('"yummlyfood:time" content="',$array1[count($array1) - 1]);
$array1 = explode('>',$help[0]);
echo $array1[0];
echo "<br>";
$array1 = explode('name="description"',$help[1]);
$help = explode('"',$array1[0]);
echo "<br>";
echo "Time to be ready: ". $help[0];
echo "<br>";
$help = explode('property="og:description"',$array1[1]);
$array1 = explode('"',$help[0]);
echo "<br>";
echo "Description: ". $array1[1];
echo "<br>";
$array1 = explode('<h1 itemprop="name" title=',$help[1]);
//echo "mikos: " . count($array1);
$help = explode('attribution definition has-added-by',$array1[1]);
$array1 = explode('</h1>',$help[0]);
$help1 = explode('>',$array1[0]);
echo "<br>";
echo " Name:   " . $help1[1];
echo "<br>"."<br>"."sustatika"."<br>" ;
$array1 = explode('<b>Calories</b>',$help[1]);
$help = explode('itemprop="fatContent">',$array1[1]);
$help1 = explode(' itemprop="calories">',$help[0]);
$array1 =explode('</span>',$help1[1]);
echo "Calories: " . $array1[0];
echo "<br>";
$array1 = explode('itemprop="saturatedFatContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Total Fat: " . $help1[0] ." kai se pososto:.". $percentage[0];
echo "<br>";
$help = explode('<i>Trans Fat</i>',$array1[1]);
$help1 =explode('</span>',$help[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Saturated Fat" , $help1[0] ."kai pososto ". $percentage[0];
echo "<br>";
$help = explode('itemprop="cholesterolContent">',$help[1]);
$help1 = explode('<td class="percentage">',$help[0]);
$percentage = explode('</td>',$help1[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Trans Fat" ."mono se pososto ". $percentage[0];
echo "<br>";
$array1 = explode('itemprop="sodiumContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Cholesterol" , $help1[0]." pososto " . $percentage[0];
echo "<br>";
$help = explode('<b>Potassium</b>',$array1[1]);
$help1 = explode('</span>',$help[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Sodium" , $help1[0]." pososto ".$percentage[0];
echo "<br>";
$array1 = explode('itemprop="carbohydrateContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Potassium" , $help1[0]." kai pososto ".$percentage[0];
echo "<br>";
$help = explode('itemprop="fiberContent">',$array1[1]);
$help1 = explode('</span>',$help[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Total Carbohydrate" , $help1[0] . " pososto ".$percentage[0];
echo "<br>";
$array1 = explode('itemprop="sugarContent">',$help[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Dietary Fiber" , $help1[0] . " pososto " .$percentage[0];
echo "<br>";
$array1 = explode('itemprop="proteinContent">',$array1[1]);
$help1 = explode('</span>',$array1[0]);
$percentage = explode('class="percentage">',$help1[1]);
$percentage = explode('</td>',$percentage[1]);
$percentage[0] = rtrim(chop($percentage[0]),"%");
echo "Sugars" , $help1[0]." pososto " . $percentage[0];
echo "<br>";
$help = explode('class="child">Vitamin A',$array1[1]);
$help1 = explode('</span>',$help[0]);
echo "Protein" . $help1[0];
echo "<br>";
$help = explode('class="child">Vitamin C',$array1[1]);
$help1 = explode('class="percentage">',$help[0]);
$array1 = explode('%',$help1[1]);
echo "Vitamin A" , $array1[0];
echo "<br>";
$array1 = explode('class="child">Calcium',$help[1]);
$help1 = explode('class="percentage">',$array1[0]);
$help= explode('%',$help1[1]);
echo "Vitamin C" , $help[0];
echo "<br>";
$help = explode('class="child">Iron',$array1[1]);
//echo "length " . count($array1) . $array1[0];
$help1 = explode('class="percentage">',$help[0]);
$array1 = explode('%',$help1[1]);
echo "Calcium" , $array1[0];
echo "<br>";
$help = explode('footnote',$help[1]);
//echo "length " . count($array1) . $array1[0];
$help1 = explode('class="percentage">',$help[0]);
$array1 = explode('%',$help1[1]);
echo "Calcium" , $array1[0];
echo "<br>"."<br>";
echo "* Percent Daily Values are based on a 2,000 calorie diet. Your Daily Values may be higher or lower depending on your calorie needs.";

?>
</body>

</html>