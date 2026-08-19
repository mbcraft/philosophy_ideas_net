<?php

$PROJECT_DIR = dirname(__DIR__);

if (!defined("PROJECT_DIR"))
define("PROJECT_DIR",$PROJECT_DIR);

require_once(PROJECT_DIR."/include/philosophy_page_support_functions.php");

$BASE_URL = "https://www.philosophy-ideas.net";

$LANGUAGES = array("it","en");

// Section pages: index, home, fun, docs, philosophy (both languages).
// Their lastmod is taken from the actual content file, so it stays accurate
// as those pages get edited.
$section_pages = array("index","home","fun","docs","philosophy");

$urls = array();

function add_url(&$urls,$loc,$lastmod_timestamp,$changefreq,$priority) {

	$urls[] = array(
		"loc" => $loc,
		"lastmod" => date("Y-m-d",$lastmod_timestamp),
		"changefreq" => $changefreq,
		"priority" => $priority
	);

}

foreach ($section_pages as $page) {

	foreach ($LANGUAGES as $lang) {

		$content_file = PROJECT_DIR."/content/".$page."/".$lang.".php";

		$lastmod = file_exists($content_file) ? filemtime($content_file) : time();

		add_url($urls,$BASE_URL."/".$lang."/".$page.".php",$lastmod,"yearly","0.1");
	}
}

// Philosophy elements: generated dynamically from the ranges defined in
// philosophy_page_support_functions.php ($all_ranges), so adding, removing
// or renumbering elements there is automatically reflected here, with no
// need to touch this script.
foreach ($all_ranges as $range_spec) {

	$letter = $range_spec[0];
	$start = $range_spec[1];
	$end = $range_spec[2];

	for ($i = $start; $i < $end; $i++) {

		$element_id = $letter."_".get_padded_number($i);

		foreach ($LANGUAGES as $lang) {

			$element_file = PROJECT_DIR."/content/philosophy/elements/".$lang."/".$element_id.".php";

			$lastmod = file_exists($element_file) ? get_element_sitemap_last_modified_time($lang,$element_id) : time();

			add_url($urls,$BASE_URL."/".$lang."/philosophy/".$element_id.".php",$lastmod,"yearly","0.1");
		}
	}
}

// Downloadable documents (docs section): generated from the list of
// currently available documents in __available_documents.php, which is
// already kept in sync with what's actually in src/downloads/ (documents
// moved to trash are removed from there too). Unlike the other pages,
// these URLs have no language prefix: the language is encoded in the
// filename itself (e.g. cerimonie.html vs cerimonies.html).
require_once(PROJECT_DIR."/api/v1.2/__available_documents.php");

foreach ($LANGUAGES as $lang) {

	foreach ($available_documents[$lang] as $document_name) {

		$document_file = PROJECT_DIR."/downloads/".$document_name.".html";

		$lastmod = file_exists($document_file) ? filemtime($document_file) : time();

		add_url($urls,$BASE_URL."/downloads/".$document_name.".html",$lastmod,"yearly","0.1");
	}
}

$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n\n";
$xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

foreach ($urls as $u) {
	$xml .= "\t<url>\n";
	$xml .= "\t\t<loc>".htmlspecialchars($u["loc"],ENT_XML1)."</loc>\n";
	$xml .= "\t\t<lastmod>".$u["lastmod"]."</lastmod>\n";
	$xml .= "\t\t<changefreq>".$u["changefreq"]."</changefreq>\n";
	$xml .= "\t\t<priority>".$u["priority"]."</priority>\n";
	$xml .= "\t</url>\n";
}

$xml .= "</urlset>\n";

file_put_contents(PROJECT_DIR."/sitemap.xml",$xml);

echo "Sitemap rigenerata: ".count($urls)." URL scritti in sitemap.xml\n";
