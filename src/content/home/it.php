<?php

$title_suffix = "Informazioni";

$description = "Alcune informazioni su questo sito internet";
$keywords = "sito internet, informazioni";

ob_start();
?>
<br /><br /><br />
<h2>
<span class="brief">

</div>
</span>
</h2>
<?php

$content = ob_get_contents();
ob_end_clean();
?>