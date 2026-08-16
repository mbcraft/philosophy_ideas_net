<?php

$letter_series = array('H','A','B','C','D','T','Z');

$is_search_with_words = filter_input(INPUT_GET, "mode")=="search_with_words";

if (isset($element) && $element) {
    $parts = explode('_', $element);
    $letter = $parts[0];
    $number = $parts[1];
    $previous_element = str_pad($number - 1, 3, '0', STR_PAD_LEFT);
    $next_element = str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    $current_range = isset($ranges_by_letter[$letter]) ? $ranges_by_letter[$letter] : null;
    $is_previous_show = $number > 1 && !$is_search_with_words;
    $is_next_show = $current_range && $number < $current_range[2] - 1 && !$is_search_with_words;
    $is_last_of_series = $current_range && $number == $current_range[2] - 1 && !$is_search_with_words;
} else {
    $letter = null;
    $number = null;
    $previous_element = null;
    $next_element = null;
    $current_range = null;
    $is_previous_show = false;
    $is_next_show = false;
    $is_last_of_series = false;
}

// If we're on the last element of a series, look up the next series in the
// sequence (if any) so we can point the reader to it. Fully driven by
// $letter_series / $ranges_by_letter, so adding elements to a series (or a
// whole new series, as long as it's added to those two structures and to
// the letter buttons row below) requires no changes here.
$next_series_letter = null;

if ($is_last_of_series) {
    $series_index = array_search($letter, $letter_series);

    if ($series_index !== false && isset($letter_series[$series_index + 1])) {
        $next_series_letter = $letter_series[$series_index + 1];
    }
}

//$lang is defined

?>
<?php if ($next_series_letter) { ?>
<div align="center" class="series_end_message" style="margin:10px 0;">
    <?php if (LANG=="it") { ?>
        Questo &egrave; l'ultimo elemento della serie <?=$letter?>, puoi procedere con la serie <?=$next_series_letter?> cliccando sul pulsante <?=$next_series_letter?> qui sotto.
    <?php } else { ?>
        This is the last element of series <?=$letter?>, you can proceed with series <?=$next_series_letter?> by clicking the <?=$next_series_letter?> button below.
    <?php } ?>
</div>
<?php } ?>
<div align="center" class="nav_buttons_row">
    <?php
    if ($is_previous_show) {
    ?>
    <div align="left" class='s5 m4 l3 nav_prev_cell' style="display:inline-block;vertical-align: middle;">
            <?php
                echo_generic_small_page_button("document.location.href='/".$lang."/philosophy/".$letter."_".$previous_element.".php?with_back_to_results=false';","back_to_search_button_background.jpg","white","Precedente","Previous");
            ?>
    </div>
    <?php
    }
    else echo_empty_small_placeholder("nav_prev_cell");
    ?>
    <div align="center" class='s6 m5 l4 nav_center_cell' style="display:inline-block; vertical-align: middle;">
            <?php
                echo_generic_big_page_button("document.location.href='/".$lang."/philosophy.php';","back_to_search_button_background.jpg","white","Torna alla ricerca","Back to search");
            ?>
    </div>
    <?php
    if ($is_next_show) {
    ?>
    <div align="right" class='s5 m4 l3 nav_next_cell' style="display:inline-block; vertical-align: middle;">
            <?php


                echo_generic_small_page_button("document.location.href='/".$lang."/philosophy/".$letter."_".$next_element.".php?with_back_to_results=false';","back_to_search_button_background.jpg","white","Successivo","Next");
            ?>
    </div>
    <?php
    }
    else echo_empty_small_placeholder("nav_next_cell");
    ?>
</div>
<div align="center" class="letter_buttons_row">
    <?php
        echo_generic_very_small_page_button("document.location.href='/".$lang."/philosophy/H_001.php?with_back_to_results=false';","back_to_search_button_background.jpg","white","[ H ]","[ H ]","v_1");
    ?>
    <?php
        echo_generic_very_small_page_button("document.location.href='/".$lang."/philosophy/A_001.php?with_back_to_results=false';","back_to_search_button_background.jpg","white","[ A ]","[ A ]","v_2");
    ?>
    <?php
        echo_generic_very_small_page_button("document.location.href='/".$lang."/philosophy/B_000.php?with_back_to_results=false';","back_to_search_button_background.jpg","white","[ B ]","[ B ]","v_3");
    ?>
    <?php
        echo_generic_very_small_page_button("document.location.href='/".$lang."/philosophy/C_001.php?with_back_to_results=false';","back_to_search_button_background.jpg","white","[ C ]","[ C ]","v_4");
    ?>
    <?php
        echo_generic_very_small_page_button("document.location.href='/".$lang."/philosophy/D_001.php?with_back_to_results=false';","back_to_search_button_background.jpg","white","[ D ]","[ D ]","v_5");
    ?>
    <?php
        echo_generic_very_small_page_button("document.location.href='/".$lang."/philosophy/T_001.php?with_back_to_results=false';","back_to_search_button_background.jpg","white","[ T ]","[ T ]","v_6");
    ?>
    <?php
        echo_generic_very_small_page_button("document.location.href='/".$lang."/philosophy/Z_001.php?with_back_to_results=false';","back_to_search_button_background.jpg","white","[ Z ]","[ Z ]","v_7");
    ?>
</div>    