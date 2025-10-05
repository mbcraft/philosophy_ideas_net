<?php

$PROJECT_DIR = dirname(__DIR__);

if (!defined("PROJECT_DIR"))
define("PROJECT_DIR",$PROJECT_DIR);

$page_content = "<?php\n\n".

"define(\"DIR_PREFIX\",\"../../\");\n\n".

"include_once(DIR_PREFIX.\"_philosophy_element.php\");";

require_once(PROJECT_DIR."/include/philosophy_page_support_functions.php");

foreach ($all_ranges as $range) {

	echo "Writing all elements for range ".$range[0]." ...\n";

	for ($i=$range[1];$i<$range[2];$i++) {

		$filename = $range[0].'_'.str_pad($i,3,"0",STR_PAD_LEFT).".php";

		if (!file_exists(PROJECT_DIR."/it/philosophy/".$filename)) file_put_contents(PROJECT_DIR."/it/philosophy/".$filename,$page_content);
		if (!file_exists(PROJECT_DIR."/en/philosophy/".$filename)) file_put_contents(PROJECT_DIR."/en/philosophy/".$filename,$page_content);

	}

}

echo "Done!\n";