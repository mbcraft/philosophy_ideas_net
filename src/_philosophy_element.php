<?php

require_once('include/lang.php');
include_once("include/visit_counter.php");

if (!defined("PROJECT_DIR"))
define("PROJECT_DIR",__DIR__);

require_once('include/philosophy_page_support_functions.php');
require_once("content/philosophy/".$lang.".php");

$filename = $current_page;
$filename_parts = explode('.',$filename);

$element = get_formatted_element_id($filename_parts[0]);

$parts = explode('_',$element);

$letter = $parts[0];
$element_number = $parts[1];

$element_content = get_element_content($lang,$element);

$element_meta_file = "content/philosophy/elements_meta/".$lang."/".$element.".php";

if (file_exists($element_meta_file)) {
    // $title_suffix, $description, $keywords come from the companion file.
    require($element_meta_file);
} else {
    $element_plain_text = get_element_plain_text($lang,$element);

    if ($element_plain_text !== '') {
        $title_suffix = truncate_for_meta($element_plain_text,70)." (".$element.")";
        $description = build_element_description($element_plain_text,155);
    }
}

include_once("include/begin_html.php");
include_once("include/meta.php");
include_once("include/begin_content_with_language_switches.php");
include_once("include/menu.php");
include_once("include/top_poem.php");

?>
<div id="main_content" class="content">
    <div class="box_large">
        <?php
            echo $element_content;

            if (filter_input(INPUT_GET,"with_back_to_results")==="true") include("include/back_to_search_results.php");
            else include_once("include/back_to_philosophy_search_page.php");
        ?>
    </div>
</div>
<?php
include_once("include/footer.php");
include_once("include/end_content.php");
include_once("include/end_html.php");
?>