<?php

$title_suffix = "Informazioni";

$description = "Alcune informazioni su questo sito internet";
$keywords = "sito internet, informazioni";

ob_start();
?>
<br /><br /><br />
<h2>
<span class="brief">
	Questo sito internet contiene un elenco di elementi filosofici ricercati e redatti nel corso di circa un anno e mezzo di ricerca, contiene numerosi meme e dei documenti su vari argomenti. Mi auguro che possiate trovare il tutto di vostro gradimento. - L'autore (Marco B.)
	<hr />
	<h1>Ultime modifiche</h1>
	31 Agosto 2025 - Concept per un carro raccolta per food forest, A_183, A_652, A_653, A_654, A_655
	<br /><br />
	30 Agosto 2025 - Concept per un ponte galleggiante (Versione 1.1), A_645, A_651, fix alle API.
	<br />
	<br />
	28 Agosto 2025 - Elementi : A_004, A_602, A_644, A_645, A_646, A_647, A_648, A_649, A_650.
</div>
</span>
</h2>
<?php

$content = ob_get_contents();
ob_end_clean();
?>