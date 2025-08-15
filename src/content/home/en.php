<?php

$title_suffix = "Informations";

$description = "Some informations about this website";
$keywords = "website, informations";

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