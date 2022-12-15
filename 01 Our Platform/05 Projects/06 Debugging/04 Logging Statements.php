<?php 
include(DOCS_RESOURCES."/logging-statements/introduction.php"); 
$terminalLink = "/docs/v2/our-platform/projects/ide#06-Cloud-Terminal";
$getLogIntroText($terminalLink);
?>

<h4>Log</h4>
<?php
include(DOCS_RESOURCES."/logging-statements/log.php");
$getLogText(true);
?>

<h4>Debug</h4>
<?php echo file_get_contents(DOCS_RESOURCES."/logging-statements/debug.php"); ?>

<h4>Error</h4>
<?php echo file_get_contents(DOCS_RESOURCES."/logging-statements/error.php"); ?>

<h4>Quit</h4>
<?php echo file_get_contents(DOCS_RESOURCES."/logging-statements/quit.php"); ?>