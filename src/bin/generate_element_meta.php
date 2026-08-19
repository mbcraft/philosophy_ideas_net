<?php

$PROJECT_DIR = dirname(__DIR__);

if (!defined("PROJECT_DIR"))
define("PROJECT_DIR",$PROJECT_DIR);

require_once(PROJECT_DIR."/include/philosophy_page_support_functions.php");

$LANGUAGE_KEYWORDS = array(
	"it" => "filosofia, consigli, amicizia",
	"en" => "philosophy, tips, friendship",
);

$written = 0;
$skipped = 0;

foreach ($all_ranges as $range_spec) {

	$letter = $range_spec[0];
	$start = $range_spec[1];
	$end = $range_spec[2];

	for ($i = $start; $i < $end; $i++) {

		$element_id = $letter."_".get_padded_number($i);

		foreach ($LANGUAGE_KEYWORDS as $lang => $keywords) {

			$content_file = PROJECT_DIR."/content/philosophy/elements/".$lang."/".$element_id.".php";

			if (!file_exists($content_file)) {
				$skipped++;
				continue;
			}

			$plain_text = get_element_plain_text($lang,$element_id);

			if ($plain_text === '') {
				$skipped++;
				continue;
			}

			$title = truncate_for_meta($plain_text,70)." (".$element_id.")";
			$description = build_element_description($plain_text,155);

			$meta_dir = PROJECT_DIR."/content/philosophy/elements_meta/".$lang;
			if (!is_dir($meta_dir)) mkdir($meta_dir,0775,true);

			$meta_file = $meta_dir."/".$element_id.".php";

			$php = "<?php\n\n".
				"\$title_suffix = ".var_export($title,true).";\n".
				"\$description = ".var_export($description,true).";\n".
				"\$keywords = ".var_export($keywords,true).";\n";

			file_put_contents($meta_file,$php);
			$written++;
		}
	}
}

echo "File meta scritti: ".$written." (saltati: ".$skipped.")\n";
