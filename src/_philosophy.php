<?php


require_once('include/lang.php');
include_once("include/visit_counter.php");

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
            if (isset($_GET["mode"])) {
                if ($_GET["mode"]=="one_element") {
                    $element = get_formatted_element_id($_GET["element_key"]);

                    $parts = explode('_',$element);

                    $letter = $parts[0];
                    $element_number = $parts[1];

                    echo get_element_content($lang,$element);

                    if (filter_input(INPUT_GET,"with_back_to_results")==="true") include("include/back_to_search_results.php");
                    else include_once("include/back_to_philosophy_search_page.php");
                }

                if ($_GET["mode"]=="search_with_words") {

                    $search_query = filter_input(INPUT_GET,"search_query");

                    $r = search_by_words($lang,$search_query);

                    $no_results = $r["no_results"];
                    $current_result_list = $r["result_set"];

                    if ($no_results) {
                        if ($lang=="it") {
                            echo "<p>Non sono stati trovati risultati.</p>";
                        } else {
                            echo "<p>No results found.</p>";
                        }
                    } else {
                        if ($lang=="it") {
                            echo "<p>Risultati della ricerca:</p>";
                        } else {
                            echo "<p>Results of search:</p>";
                        }
                        echo "<ul>";
                        $searched_words = strtolower(filter_input(INPUT_GET,"search_query"));
                        $word_list = explode(" ",$searched_words);
                        foreach ($current_result_list as $element) {

                            $element_content = html_entity_decode(get_element_content($lang,$element));

                            $start = 0;
                            $end = strlen($element_content)-1;

                            foreach ($word_list as $word) {
                                $p = strpos($element_content,$word);
                                if ($p!==false) {

                                    $start = $p-60;
                                    $end = $p + strlen($word)+60;
                                }
                            }

                            if ($start<6) $start=6;
                            if ($end>strlen($element_content)-1) $end=strlen($element_content)-1;
                            $element_extract = '"...'.substr($element_content,$start,$end-$start).'..."';
                            $element_extract = str_replace($word,'<b>'.$word.'</b>',$element_extract);
                            echo "<li>";
                            echo "<a href='/".$lang."/philosophy/".$element.".php?with_back_to_results=true'>".$element."</a> - ".$element_extract;
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                    include_once("include/back_to_philosophy_search_page.php");  
                    
                }


                if ($_GET["mode"]=="full_list") {

                    require_once("content/philosophy/elements/full_list.php");

                }

                if ($_GET["mode"]=="full_links_list") {

                    require_once("content/philosophy/elements/full_links_list.php");

                }
                
            } else {
                echo $search_interface;
            }
        ?>
    </div>
</div>
<?php
include_once("include/footer.php");
include_once("include/end_content.php");
include_once("include/end_html.php");
?>