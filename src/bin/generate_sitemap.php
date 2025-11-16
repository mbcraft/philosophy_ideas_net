<?php

$PROJECT_DIR = dirname(__DIR__);

if (!defined("PROJECT_DIR"))
define("PROJECT_DIR",$PROJECT_DIR);

echo "Initial pages set ...\n";

$double_language_elements = ["index.php","home.php","fun.php","docs.php","philosophy.php"];

require_once(PROJECT_DIR."/include/philosophy_page_support_functions.php");

foreach ($all_ranges as $range) {

	echo "Writing all elements for range ".$range[0]." ...\n";

	for ($i=$range[1];$i<$range[2];$i++) {

		$filename = "philosophy/".$range[0].'_'.str_pad($i,3,"0",STR_PAD_LEFT).".php";

		$double_language_elements []= $filename;
		
	}

}

$additional_elements = [];

require_once(PROJECT_DIR."/api/v1.2/__available_documents.php");

foreach ($available_documents as $lang => $docs) {
	foreach ($docs as $doc) {
		$additional_elements []= "/downloads/".$doc.".html";
	}
}

$final_elements_list = [];

foreach ($double_language_elements as $element) {
	$final_elements_list [] = "/it/".$element;
	$final_elements_list [] = "/en/".$element;
}

foreach ($additional_elements as $element) {
	$final_elements_list []= $element;
}

$begin_sitemap = <<<EOD
<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

EOD;

$end_sitemap = <<<EOD
</urlset> 
EOD;

$sitemap_content = $begin_sitemap;

/*
   <url>
      <loc>http://www.mbcraft.it/it/index.php</loc>
      <lastmod>2025-10-07</lastmod>
      <changefreq>yearly</changefreq>
      <priority>0.025</priority>
   </url>
*/

foreach ($final_elements_list as $el) {
	$sitemap_content .= "\t<url>\n";
	$sitemap_content .= "\t\t<loc>https://www.philosophy-ideas.net".$el."</loc>\n";
	$sitemap_content .= "\t\t<lastmod>2025-11-16</lastmod>\n";
	$sitemap_content .= "\t\t<changefreq>yearly</changefreq>\n";
	$sitemap_content .= "\t\t<priority>0.1</priority>\n";
	$sitemap_content .= "\t</url>\n";
}

$sitemap_content .= $end_sitemap;

echo "Writing sitemap file ...\n";

file_put_contents(PROJECT_DIR."/sitemap2.xml",$sitemap_content);

echo "Done!\n";