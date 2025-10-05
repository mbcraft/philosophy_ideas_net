<?php

require_once('include/lang.php');

if (!defined("PROJECT_DIR"))
define("PROJECT_DIR",__DIR__);

require_once('include/philosophy_page_support_functions.php');
require_once("content/philosophy/".$lang.".php");
include_once("include/begin_html.php");
include_once("include/meta.php");
include_once("include/begin_content_with_language_switches.php");
include_once("include/menu.php");
include_once("include/top_poem.php");

?>
<div id="main_content" class="content">
    <div class="box_large">
        <?php
            $filename = $current_page;
            $filename_parts = explode('.',$filename);

            $element = get_formatted_element_id($filename_parts[0]);

            $parts = explode('_',$element);

            $letter = $parts[0];
            $element_number = $parts[1];

            echo "<h2>";
            echo get_element_content($lang,$element);
            echo "</h2>";
                    
            echo $content;

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