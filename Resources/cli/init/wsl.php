<?php
$getWSLText = function($isCLIDocs)
{
    $directory = $isCLIDocs ? "CLI root directory" : "workspace";
    
    echo "
<p>
    If you are running Docker on Windows using the legacy Hyper-V backend instead of the new WSL 2 backend, you need to enable file sharing for your temporary directories and for your {$directory}.
    To do so, open your Docker settings, go to <span class='menu-name'>Resources &gt; File Sharing</span> and add <span class='private-directory-name'>C:/Users/&lt;username&gt;/AppData/Local/Temp</span> and your {$directory} path to the list.
    Click <span class='button-name'>Apply &amp; Restart</span> after making the required changes.
</p>
    ";
}

?>