<?php

$current_doc = $_SERVER['PHP_SELF'];

$prepared_string = substr($current_doc,1);

$parts = explode('/',$prepared_string);

$lang = $parts[0];

define("LANG",$lang);

$current_page = end($parts);

//italiano

$parts[0] = "it";

$full_current_page_it = '/'.join('/',$parts);

//english

$parts[0] = "en";

$full_current_page_en = '/'.join('/',$parts);