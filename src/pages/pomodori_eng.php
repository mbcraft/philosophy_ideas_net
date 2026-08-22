<?php

define("LANG","en");

require_once('../include/lang.php');
include_once("../include/visit_counter.php");
include_once("../include/begin_html.php");
include_once("../include/meta.php");
include_once("../include/begin_content_with_back_to_fun_page_button.php");
include_once("../include/menu.php");
include_once("../include/top_poem.php");

?>
<div id="main_content" class="content">
    <div class="box_very_large">
        <img src="/images/meme/meme_pomodori/eng/1.jpg" alt="Pomodori 1" width="600"/>
        <hr />
        <img src="/images/meme/meme_pomodori/eng/2.jpg" alt="Pomodori 2" width="600"/>
        <hr />
        <img src="/images/meme/meme_pomodori/eng/3.jpg" alt="Pomodori 3" />
        <hr />
        <img src="/images/meme/meme_pomodori/eng/4.jpg" alt="Pomodori 4" />
        <hr />
        <img src="/images/meme/meme_pomodori/eng/5.jpg" alt="Pomodori 5" />
        <hr />
        <img src="/images/meme/meme_pomodori/eng/6.jpg" alt="Pomodori 6" />
        <br />
        <br />
        PS: in the end there was only a little salt missing from the sauce...
    </div>
</div>
<?php
include_once("../include/footer.php");
include_once("../include/end_content.php");
include_once("../include/end_html.php");
?>