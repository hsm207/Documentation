<?php
include(DOCS_RESOURCES."/brokerages/cli-deployment/deploy-cloud-algorithms.php");
$isSupported = true;
$brokerageDetails = "";
$supportsCashHoldings = true;
$supportedPortfolioHoldings = true;
$getDeployCloudAlgorithmsText("QuantConnect Paper Trading", $isSupported, $brokerageDetails, $supportsCashHoldings, $supportedPortfolioHoldings);
?>
