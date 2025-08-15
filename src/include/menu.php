<?php
$skip_to_content = array("it"=>"Vai al contenuto","en" => "Skip to content");
$menu = array("it" => array("HOME","FILOSOFIA","DIVERTIMENTO","FILE"),"en" => array("WELCOME","PHILOSOPHY","FUN","FILES"));
?>
<h4>
    <a id="skip_to_main_content" href="#main_content"><?=$skip_to_content[$lang] ?></a>
</h4>
<nav>
    <h1>Menu:</h1>
    <div class="w3-cell-row w3-light-blue menu" style="min-width:100%;" role="menu">
        <div role="menuitem" class="w3-cell w3-mobile w3-cell-middle menu_item yellow" onclick="document.location.href = '/home.php'">
            <?=$menu[$lang][0] ?>
        </div>
        <div role="menuitem" class="w3-cell w3-mobile w3-cell-middle menu_item blue" onclick="document.location.href = '/philosophy.php'">
            <?=$menu[$lang][1] ?>
        </div>        
        <div role="menuitem" class="w3-cell w3-mobile w3-cell-middle menu_item green" onclick="document.location.href = '/fun.php'">
            <?=$menu[$lang][2] ?>
        </div>
        <div role="menuitem" class="w3-cell w3-mobile w3-cell-middle menu_item brown" onclick="document.location.href = '/files.php'">
            <?=$menu[$lang][3] ?>
        </div>
    </div>
</nav>
