<?php

$range_H_A = array('H',1,12,'black');
$range_A_A = array('A',1,667,'black');
$range_B_A = array('B',0,18,'black');
$range_C_A = array('C',1,11,'black');
$range_D_A = array('D',1,3,'black');
$range_T_A = array('T',1,3,'black');
$range_Z_A = array('Z',1,5,'black');


$all_ranges = array($range_H_A,$range_A_A,$range_B_A,$range_C_A,$range_D_A,$range_T_A,$range_Z_A);

$ranges_by_letter = array('H' => $range_H_A,'A' => $range_A_A,'B' => $range_B_A,'C' => $range_C_A,'D' => $range_D_A,'T' => $range_T_A,'Z' => $range_Z_A);

function get_formatted_element_id($element_specification) {
    $parts = explode("_",$element_specification);

    if (count($parts)==1) {
        $letter = substr($parts[0],0,1);
        $num = substr($parts[0],1);

        return $letter."_".str_pad($num,3,"0",STR_PAD_LEFT);
    }

    if (count($parts)==2) {
        return $parts[0]."_".str_pad($parts[1],3,"0",STR_PAD_LEFT);
    }

}

function print_range($range_specification) {
	echo "<div style='margin:10px;padding:10px;border-style:solid;border-color:".$range_specification[3].";text-align:center;color:".$range_specification[3].";'>";
    echo "<b>";
	echo $range_specification[0]."_".get_padded_number($range_specification[1])." - ".$range_specification[0]."_".get_padded_number($range_specification[2]-1);
    echo "</b>";
	echo "</div>";
}

function print_available_ranges($range_list) {

	foreach ($range_list as $range_spec) {
		print_range($range_spec);
	}
}

function get_padded_number($num) {
    return str_pad($num,3,"0",STR_PAD_LEFT);
}

function get_element_content($lang,$element_id) {

    $path = PROJECT_DIR."/content/philosophy/elements/".$lang."/".$element_id.".php";

    if (file_exists($path)) {

        $content = file_get_contents($path);

        $content = str_replace("&ldpos;",'&quot;',$content);
        $content = str_replace("&rdpos;",'&quot;',$content);

        return $content;

    } else {
        if ($lang == "it") {
            return "L'elemento <b>".$element_id."</b> non &egrave; stato trovato.";
        }
        if ($lang == "en") {
            return "Element <b>".$element_id."</b> not found.";
        }
    }
}


function get_element_last_modified_time($lang,$element_id) {
    return filemtime(PROJECT_DIR."/content/philosophy/elements/".$lang."/".$element_id.".php");
}

// Like get_element_last_modified_time(), but also takes into account the
// companion meta file (title/description/keywords), if present, so editing
// just the meta still bumps the element's sitemap lastmod.
function get_element_sitemap_last_modified_time($lang,$element_id) {

    $lastmod = get_element_last_modified_time($lang,$element_id);

    $meta_file = PROJECT_DIR."/content/philosophy/elements_meta/".$lang."/".$element_id.".php";

    if (file_exists($meta_file)) $lastmod = max($lastmod,filemtime($meta_file));

    return $lastmod;
}

// Plain-text (no tags, no HTML entities) version of an element's content,
// with the leading "ID - " prefix stripped. Used to build unique per-element
// <title>/meta description, since the raw content is HTML with entities.
function get_element_plain_text($lang,$element_id) {

    $content = get_element_content($lang,$element_id);

    $content = preg_replace('/^'.preg_quote($element_id,'/').'\s*-\s*/','',$content);
    $content = strip_tags($content);
    $content = html_entity_decode($content,ENT_QUOTES,'UTF-8');

    return trim(preg_replace('/\s+/',' ',$content));
}

// Truncates $text to at most $max_len characters, breaking on a word
// boundary and appending an ellipsis, for use in <title>/meta description.
function truncate_for_meta($text,$max_len) {

    if (mb_strlen($text) <= $max_len) return $text;

    $truncated = mb_substr($text,0,$max_len);

    $last_space = mb_strrpos($truncated,' ');
    if ($last_space !== false) $truncated = mb_substr($truncated,0,$last_space);

    return rtrim($truncated," ,.;:-")."…";
}

// Builds a meta description out of whole leading sentences of $text (never
// cutting mid-sentence), stopping before the sentence that would push the
// result past $max_len. Falls back to truncate_for_meta() if even the first
// sentence alone is too long.
function build_element_description($text,$max_len = 155) {

    $sentences = preg_split('/(?<=[.!?])\s+/u',$text,-1,PREG_SPLIT_NO_EMPTY);

    $description = '';

    foreach ($sentences as $sentence) {

        $candidate = trim($description.' '.$sentence);

        if (mb_strlen($candidate) > $max_len) break;

        $description = $candidate;
    }

    if ($description === '') $description = truncate_for_meta($text,$max_len);

    return $description;
}

function print_element($lang,$element_id) {

    $element_content = file_get_contents(PROJECT_DIR."/content/philosophy/elements/".$lang."/".$element_id.".php");

    echo $element_content;
}

function print_indexed_element($lang,$letter,$i) {

    $number = get_padded_number($i);

    print_element($lang,$letter."_".$number);

}

function print_range_by_specification($lang,$specification) {

    $letter = $specification[0];
    $start = $specification[1];
    $end = $specification[2];

    for ($i = $start;$i<$end;$i++) {

        echo "<hr />";

        print_indexed_element($lang,$letter,$i);
    }

}

function search_by_words($lang,$search_query) {
    $index_content = file_get_contents(PROJECT_DIR."/resources/".$lang."_words_index.json");

    $loaded_index = json_decode($index_content,true);

    $searched_words = strtolower(filter_input(INPUT_GET,"search_query"));

    $searched_words_fixed = str_replace(',',' ',$searched_words);

    $word_list = explode(" ",$searched_words_fixed);

    $no_result = false;
    $first_set = true;

    $current_result_list = null;

    foreach ($word_list as $word) {
        if (isset($loaded_index[$word])) {
            $element_list = $loaded_index[$word];

            if ($first_set) {
                $first_set = false;
                $current_result_list = $element_list;
            } else {
                $current_result_list = array_intersect($current_result_list,$element_list);
            }
        }
    }

    $no_result = empty($current_result_list);

    return array("no_results" => $no_result,"result_set" => $current_result_list);
}

function generate_philosophy_links_list($all_ranges,$lang) {

    foreach ($all_ranges as $range) {
        $letter = $range[0];
        $begin = $range[1];
        $end = $range[2];

        for ($i=$begin;$i<$end;$i++) {

            $element = $letter.'_'.str_pad($i,3,'0',STR_PAD_LEFT).".php";

            echo "<a href='/".LANG."/philosophy/".$element."'>".$element."</a> - ";
        }

        echo "<br /><br /><br />";
    }

}