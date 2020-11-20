<?php

// Included Array From Config.php
include './config.php';

// Getting Data With Post
$pickup = $_POST['pickup'];
$drop = $_POST['drop'];
$cabType = $_POST['cabType'];
$luggage = $_POST['luggage'];

//Global Variable
$pickupDistance = "";
$dropDistance = "";
$luggageTotal = 0;

//Matching pickup and Drop location and fetching Distance 
foreach ($db as $key => $value)
{
    if ($value['location'] == $pickup)
    {
        $pickupDistance = $value['distance'];
    }
    if ($value['location'] == $drop)
    {
        $dropDistance = $value['distance'];
    }

}


//Calaculating Total Distance
$totalDistance = abs($dropDistance - $pickupDistance);


//Calculating Luggage
if ($luggage <= 10)
{
    $luggageTotal = 50;
}
else if ($luggage > 10 && $luggage <= 20)
{
    $luggageTotal = 100;
}
else
{
    $luggageTotal = 200;
}



//Calculating Fare For Cedmicro
if ($cabType == "CedMicro")
{
    $fixedfare = 50;
    if ($totalDistance <= 10)
    {
        $fare = $totalDistance * 13.50 + $fixedfare;
        echo $fare;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {
        $first10 = 10 * 13.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 12);
        $fare = $temp + $fixedfare;
        echo $fare;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 13.50) + (50 * 12.00) + ($next50 * 10.20);
        echo $fare;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 13.50) + (50 * 12.00) + (100 * 10.20) + ($next100 * 8.50);
        echo $fare;
    }
}


//Calculating Fare For CedMini
if ($cabType == "CedMini")
{
    $fixedfare = 150;
    if ($totalDistance <= 10)
    {
        $fare = $totalDistance * 14.50 + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {
        $first10 = 10 * 14.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 13);
        $fare = $temp + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 14.50) + (50 * 13) + ($next50 * 11.20);
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 14.50) + (50 * 13) + (100 * 11.20) + ($next100 * 9.50);
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }

}

//Calculating Fare For CedRoyal
if ($cabType == "CedRoyal")
{
    $fixedfare = 200;
    if ($totalDistance <= 10)
    {
        $fare = ($totalDistance * 15.50) + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {
        $first10 = 10 * 15.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 14);
        $fare = $temp + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 15.50) + (50 * 14) + ($next50 * 12.20);
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 15.50) + (50 * 14) + (100 * 12.20) + ($next100 * 10.50);
        $fareWithLuggage = $fare + $luggageTotal;
        echo $fareWithLuggage;
    }

}


//Calculating Fare For CedSUV
if ($cabType == "CedSUV")
{
    $fixedfare = 250;
    if ($totalDistance <= 10)
    {
        $fare = ($totalDistance * 16.50) + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal * 2;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {
        $first10 = 10 * 16.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 15);
        $fare = $temp + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal * 2;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 16.50) + (50 * 15) + ($next50 * 13.20);
        $fareWithLuggage = $fare + $luggageTotal * 2;
        echo $fareWithLuggage;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 16.50) + (50 * 15) + (100 * 13.20) + ($next100 * 11.50);
        $fareWithLuggage = $fare + $luggageTotal * 2;
        echo $fareWithLuggage;
    }

}

?>
