<?php

define("DIR_PREFIX","../");

require_once(DIR_PREFIX.'include/lang.php');
include_once(DIR_PREFIX."include/begin_html.php");
include_once(DIR_PREFIX."content/fun/".$lang.".php");
include_once(DIR_PREFIX."include/meta.php");
include_once(DIR_PREFIX."include/begin_content_with_language_switches.php");
include_once(DIR_PREFIX."include/menu.php");
include_once(DIR_PREFIX."include/top_poem.php");
?>
<div id="main_content" class="content">
    <div class="box_large">
        <?= $content ?>
    </div>
</div>
<?php
include_once(DIR_PREFIX."include/footer.php");
include_once(DIR_PREFIX."include/end_content.php");
include_once(DIR_PREFIX."include/end_html.php");
?>