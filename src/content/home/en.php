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
	<hr />
	<h1>Last changes</h1>
	31 August 2025 - Concept for a harvesting wagon for food forests, A_183, A_652, A_653
	<br /><br />
	30 August 2025 - Concept for a floating bridge (Versione 1.1), A_645, A_651, fix at APIs.
	<br /><br />
	28 August 2025 - Elements : A_004, A_602, A_644, A_645, A_646, A_647, A_648, A_649, A_650.
</div>
</span>
</h2>
<?php

$content = ob_get_contents();
ob_end_clean();
?>