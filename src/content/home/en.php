<?php

$title_suffix = "Informations";

$description = "Some informations about this website";
$keywords = "website, informations";

ob_start();
?>
<h2>
<span class="brief">
	This website contains a list of philosophical elements researched and compiled over the course of about a year and a half of research. It also contains numerous memes and documents on various topics. I hope you find it to your liking. - The author (Marco B.)
	<hr />
	<h1>Last changes</h1>
	11 May 2026 - Modified A_301. Added A_664.
	<br /><br />
	13 April 2026 - Replaced A_301.
	<br /><br />
	19 October 2025 - Added A_660, A_661, A_662, A_663.
	<br /><br />
	22 September 2025 - Added A_659. Readded idea on food delivery service.
	<br /><br />
	21 September 2025 - Little fixes to search.
	<br /><br />
	18 September 2025 - Added A_657, A_658.
	<br /><br />
	15 September 2025 - Logo welcome page.
	<br /><br />
	14 September 2025 - Updated A_031.
	<br /><br />
	11 September 2025 - Improved search.
	<br /><br />
	10 September 2025 - Removed A_657.
	<br /><br />
	09 September 2025 - Updates to A_088 and A_120. Added A_657.
	<br /><br />
	08 September 2025 - Replaced A_366.
	<br /><br />
	07 September 2025 - Other updates to A_654, C_011. Deleted A_657 and A_658.
	<br /><br />
	04 September 2025 - Updates to A_654. Fixes to pages footer.
	<br /><br />
	02 September 2025 - Renamed "files" section to "documents". Fixed "home" section name. Removed feedback form. Added A_656, A_657, A_658. Updated packaging thoughts.
	<br /><br />
	31 August 2025 - Concept for a harvesting wagon for food forests, A_183, A_652, A_653, A_654, A_655.
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