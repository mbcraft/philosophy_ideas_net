<?php

if (!isset($_SESSION["LANG"])){
    if (strpos($_SERVER["HTTP_ACCEPT_LANGUAGE"],"it")===0)
        $lang = "it";
    else
        $lang = "en";
}

header("Location: /".$lang."/index.php");