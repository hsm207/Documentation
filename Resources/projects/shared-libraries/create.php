<?php
$getCreateLibraryText = function($isDesktopDocs, $createProjectLink)
{
    $navSide = $isDesktopDocs ? "left" : "right" ;
    echo "
<p>Follow these steps to create a library:</p>

<ol>
    <li><a href='/docs/v2/our-platform/projects/getting-started#03-Create-Projects'>Create a new project</a>.</li>
    <li>In the project panel, click <span class='button-name'>Add Library</span>.</li>
    <li>Click <span class='button-name'>Create New</span>.</li>
    <li>In the <span class='field-name'>Input Library Name</span> field, enter a name for the library.</li>
    <li>Click <span class='button-name'>Create Library</span>.</li>
    <p>The template library files are added to your project. View the files in the Explorer panel.</p>
    <li>In the right navigation menu, click the <img class='inline-icon' src='https://cdn.quantconnect.com/i/tu/explorer-icon.png'> <span class='icon-name'>Explorer</span> icon.</li>
    <li>In Explorer panel, open the <span class='public-file-name python'>Library.py</span><span class='public-file-name csharp'>Library.cs</span> file and implement your library.</li>
    <li class='python'>Import the library into your project to use the library.</li>
    <div class='python section-example-container'>
    <pre class='python'>from library import Library</pre>
    </div>
</ol>
    ";
}
?>
