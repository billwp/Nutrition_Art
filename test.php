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
    $array = "skata";
    echo "Test array:  " . $array;
echo "<br>";
rtrim($array,"%");
echo "Meta to test exw: Array= ".$array;
echo "<br>";
$array = "skata5%";
echo "test2:  prin array= ". $array;
echo "<br>";
rtrim($array, "%");
echo "...kia meta: array= ".$array;
echo "...kia twra   : array= ". rtrim($array, "%");
echo "...kia meta: array= ".$array;
$array = rtrim($array, "%");
echo "...omws twra....: array= ".$array;
$percentage[0] = "45%";
$percentage[0] = rtrim($percentage[0],"%");
echo "Saturated Fat" ."kai pososto ". $percentage[0];
echo "ksjbvks random " . "<br>";
echo 1.25*mt_rand(1,9). "<br>";
echo 1.25*mt_rand(1,9). "<br>";
echo 1.25*mt_rand(1,9). "<br>";
echo 1.25*mt_rand(1,9). "<br>";
echo 1.25*mt_rand(1,9). "<br>";
echo 1.25*mt_rand(1,9). "<br>";
echo 1.25*mt_rand(1,9). "<br>";
echo 1.25*mt_rand(1,9). "<br>";
$array = array("lala","sasa","papap","mamama");
if (in_array("sasa",$array) )
{
    echo "exists 1 ";
}
else
{
    if(in_array("drgcfg", $array))
    {
        echo " exists 2 ";
    }
    else
    {
        echo " nothing exists";
        print_r($array);
    }
}
?>
</body>

</html>