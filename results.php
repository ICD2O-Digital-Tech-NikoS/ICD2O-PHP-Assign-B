<?php
  // gets selected size from dropdown menu 
  $size = $_POST["size"];
  // declares variable for the option which is selected to indicated the user has chosen no size
  $noSize = $_POST["size-option1"];
  // variable of price of current selected size
  $sizePrice = 0;
  // message displayed in the order summary for the selected size
  $sizeMessage = "";

  // sets sizePrice to price of a small size, and changes message for the order summary to match description of the item
  if ($size == "small") {
    $sizePrice = 0.1;
    $sizeMessage = "Crayfish left back leg";
  } 
    // sets sizePrice to price of a medium size, and changes message for the order summary to match description of the item
  else if ($size == "medium") {
    $sizePrice = 0.15;
    $sizeMessage = "Crayfish left 2nd back leg";
  }
  // sets sizePrice to price of a large size, and changes message for the order summary to match description of the item
  else if ($size == "large") {
    $sizePrice = 0.45;
    $sizeMessage = "Crayfish left claw";
  } 
  // sets sizePrice to price of a XL size, and changes message for the order summary to match description of the item
  else if ($size == "xl") {
    $sizePrice = 1;
    $sizeMessage = "Crayfish abdomen";
  }
  // declares variables for each topping option
  $toppingOne = $_POST["topping1"];
  $toppingTwo = $_POST["topping2"];
  $toppingThree = $_POST["topping3"];
  $toppingFour = $_POST["topping4"];
  $toppingFive = $_POST["topping5"];
  $toppingSix = $_POST["topping6"];
  // declares variable for the price of each topping and sets it to zero
  $toppingOnePrice = 0;
  $toppingTwoPrice = 0;
  $toppingThreePrice = 0;
  $toppingFourPrice = 0;
  $toppingFivePrice = 0;
  $toppingSixPrice = 0;
  // declares variables for the message to be displayed in the order summary should the user select one or more of these toppings
  $toppingOneMessage = "";
  $toppingTwoMessage = "";
  $toppingThreeMessage = "";
  $toppingFourMessage = "";
  $toppingFiveMessage = "";
  $toppingSixMessage = "";

// if the user selects the first topping and a size (a size because otherwise nothing is displayed since the user needs to select a size first), then it changes the price of the topping to what the price of the topping is on the menu, and changes the message to match the description of the topping
  if ($toppingOne.checked == true && $size != $noSize) {
    $toppingOnePrice = 1;
    $toppingOneMessage = "stale sun dried feta cheese, ";
  }
  // if the user selects the second topping and a size , then it changes the price of the topping to what the price of the topping is on the menu, and changes the message to match the description of the topping
  if ($toppingTwo.checked == true && $size != $noSize) {
    $toppingTwoPrice = 3;
    $toppingTwoMessage = "incandescent glass shards, ";
  } 
  // if the user selects the third topping and a size , then it changes the price of the topping to what the price of the topping is on the menu, and changes the message to match the description of the topping
  if ($toppingThree.checked == true) {
    $toppingThreePrice = 20;
    $toppingThreeMessage = "19th century apple flavored radioactive plate chips (uranium 235), ";
  }
  // if the user selects the fourth topping and a size , then it changes the price of the topping to what the price of the topping is on the menu, and changes the message to match the description of the topping
  if ($toppingFour.checked == true) {
    $toppingFourPrice = 30000;
    $toppingFourMessage = "small Paleo-Balkanic elves named mahmood, ";
  }
  // if the user selects the fifth topping and a size , then it changes the price of the topping to what the price of the topping is on the menu, and changes the message to match the description of the topping
  if ($toppingFive.checked == true) {
    $toppingFivePrice = 45;
    $toppingFiveMessage = "Lama’s spit from a camel that has traveled through florida for a total of 7 hours and 31 minutes (rare), ";
  }
  // if the user selects the second topping and a size , then it changes the price of the topping to what the price of the topping is on the menu, and changes the message to match the description of the topping
  if ($toppingSix.checked == true) {
    $toppingSixPrice = 25;
    $toppingSixMessage = "Powdered pollution^2, ";
  }

  // declares variables for the radio buttons
  $dirtWater = $_POST["option-1"];
  $dogWater = $_POST["option-2"];
  $noSide = $_POST["option-3"];
  // declares variable for the price of the sides and sets it to zero
  $dirtWaterPrice = 0;
  $dogWaterPrice = 0;
  // declares variables for the message to be displayed in the order summary should the user select one of these sides
  $dirtWaterMessage = "";
  $dogWaterMessage = "";

  // if the user selects a this side, then it changes the price of the side to what the price of the side is on the menu, and changes the message to match the description of the side
  if ($dirtWater.checked == true) {
    $dirtWaterPrice = 13;
    $dirtWaterMessage = ", and a Dirt Water beverage from a watering hole named Ernesto, who had it in bad with a yiddish garbage man and got beat up while doing the tour de france on a unicycle made from stale baguettes.";
  }
  // if the user selects a this side instead, then it changes the price of the side to what the price of the side is on the menu, and changes the message to match the description of the side
  else if ($dogWater.checked == true) {
    $dogWaterPrice = 8;
    $dogWaterMessage = ", and a Dog Water beverage.";
  } 
  // if the user selects this option, then it sets the prices of both sides to zero, since the option is for no side. This is only necessary if the user selects something and then decides they want to unselect it. 
  else if ($noSide.checked == true) {
    $dirtWaterPrice = 0;
    $dogWaterPrice = 0;
  } else {$dirtWaterMessage = ".";}

  // calculates subtotal for order
  $subtotal = $sizePrice . $toppingOnePrice . $toppingTwoPrice . $toppingThreePrice . $toppingFourPrice . $toppingFivePrice . $toppingSixPrice . $dirtWaterPrice . $dogWaterPrice;
  // calculates tax for subtotal
  $tax = $subtotal * 0.13;
  // calculates total for order
  $total = $subtotal + $tax;

  // displays the order summary
  $orderSummary = "Your ordered: One " . $sizeMessage . ", with " . $toppingOneMessage . $toppingTwoMessage . $toppingThreeMessage . $toppingFourMessage . $toppingFiveMessage . $toppingSixMessage . "on top";

  // This part with help of AI
  // Find the index of the last comma in the orderSummary string
  $lastIndex = $orderSummary.lastIndexOf(',');
  // Extract the part of the string before the last comma
  $firstPart = $orderSummary.substring(0, lastIndex);
  // Extract the part of the string after the last comma
  $secondPart = $orderSummary.substring(lastIndex + 1);
  // Concatenate the two parts to remove the last comma
  $updatedOrderSummary = $firstPart + $secondPart;

  // stops unnecessary things from being displayed if the user does not select a size.
  if ($size == $noSize) {
    echo "Please select a size";
    $orderSummary = "";
    $subtotal = 0;
    $tax = 0;
    $total = 0;
  } else {
    echo $updatedOrderSummary . $dogWaterMessage . $dirtWaterMessage . "<br>Subtotal: $" . round($subtotal,(2) . "<br>Tax: $" . round($tax,2) . "<br>Total: $" . round($total,2);
  }
?>