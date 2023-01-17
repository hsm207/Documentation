<?php 
include(DOCS_RESOURCES."/securities/tradebar.php"); 
$securityName = "security";
$pythonVariable = "self.symbol";
$cSharpVariable = "_symbol";
$getTradeBarText($securityName, $pythonVariable, $cSharpVariable);
?>

<p>We adjust the daily open and close price of bars to reflect the official <a href='/docs/v2/writing-algorithms/securities/asset-classes/us-equity/data-preparation#05-Market-Auction-Prices'>auction prices</a>.</p>