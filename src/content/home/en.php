<?php

$title_suffix = "Informations";

$description = "Some informations about this website";
$keywords = "website, informations";

ob_start();
?>
<br /><br /><br />
<h2>
<span class="brief">
	This website contains a list of philosophical elements researched and compiled over the course of about a year and a half of research. It also contains numerous memes and documents on various topics. I hope you find it to your liking. - The author (Marco B.)
</div>
</span>
</h2>
<?php

$content = ob_get_contents();
ob_end_clean();
?>