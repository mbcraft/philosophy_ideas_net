<?php

if (!defined("DIR_PREFIX")) define("DIR_PREFIX","");
$_lang_param = isset($_GET['lang']) && $_GET['lang'] === 'en' ? 'en' : 'it';
if (!defined("LANG")) define("LANG", $_lang_param);
require_once('include/lang.php');
$lang = LANG;
include_once("include/begin_html.php");
include_once("include/meta.php");
include_once("include/support_functions.php");
?>
</head>
<body style="background-image:url('/images/background/welcome_background.jpg');background-size: cover;">
   
<?php
 	include_once("content/about_internet_site/".$lang.".php");
	include_once("include/end_html.php");
?>