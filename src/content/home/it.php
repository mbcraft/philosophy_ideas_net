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
</div>
</span>
</h2>
<?php

$content = ob_get_contents();
ob_end_clean();
?>