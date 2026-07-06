<?php

$title_suffix = "Informazioni";

$description = "Alcune informazioni su questo sito internet";
$keywords = "sito internet, informazioni";

ob_start();
?>
<span class="brief">
	Questo sito internet contiene un elenco di elementi filosofici ricercati e redatti nel corso di circa un anno e mezzo di ricerca, contiene numerosi meme e dei documenti su vari argomenti. Mi auguro che possiate trovare il tutto di vostro gradimento. - L'autore (Marco B.)
</span>
<hr />
<h2>Come usare la sezione Filosofia</h2>
<p>
	La sezione <a href="/<?=$lang?>/philosophy.php">Filosofia</a> contiene una raccolta di elementi identificati da un codice univoco (es: <strong>A_123</strong>, <strong>B_012</strong>).
</p>
<ul>
	<li><strong>Inizia dagli elementi H</strong> — leggi prima gli elementi con prefisso <code>H</code> per capire il sistema e il contesto.</li>
	<li><strong>Ricerca per ID</strong> — inserisci il codice dell'elemento direttamente nella barra di ricerca (es: <code>A_123</code>).</li>
	<li><strong>Ricerca per parole chiave</strong> — inserisci una o più parole nella stessa barra: la ricerca individua automaticamente gli elementi che le contengono.</li>
	<li><strong>Lista completa</strong> — puoi sfogliare tutti gli elementi disponibili tramite il link apposito nella pagina.</li>
	<li><strong>Elenco completo</strong> — puoi visualizzare il contenuto di tutti gli elementi da un'unica pagina, elencati uno dopo l'altro.</li>
</ul>
<!--
<hr />
<h2>Ultime modifiche</h2>
11 Maggio 2026 - Modificato A_301. Aggiunto A_664.
<br /><br />
13 Aprile 2026 - Sostituito A_301.
<br /><br />
19 Ottobre 2025 - Aggiunto A_660, A_661, A_662, A_663.
<br /><br />
22 Settembre 2025 - Aggiunto A_659. Riaggiunta idea su consegna cibo a domicilio.
<br /><br />
21 Settembre 2025 - Piccoli fix alla ricerca.
<br /><br />
18 Settembre 2025 - Aggiunto A_657, A_658.
<br /><br />
15 Settembre 2025 - Logo pagina di benvenuto.
<br /><br />
14 Settembre 2025 - Aggiornato A_031.
<br /><br />
11 Settembre 2025 - Migliorata ricerca.
<br /><br />
10 Settembre 2025 - Rimosso A_657.
<br /><br />
09 Settembre 2025 - Aggiornamenti ad A_088 e A_120. Aggiunto A_657.
<br /><br />
08 Settembre 2025 - Sostituito A_366.
<br /><br />
07 Settembre 2025 - Altri aggiornamenti a A_654, C_011. Rimossi A_657 e A_658.
<br /><br />
04 Settembre 2025 - Aggiornamenti a A_654. Sistemazioni al footer delle pagine.
<br /><br />
02 Settembre 2025 - Rinominata sezione "files" in "documenti". Rimossa form di feedback. Aggiunta di A_656, A_657, A_658. Aggiornate riflessioni sul packaging.
<br /><br />
31 Agosto 2025 - Concept per un carro raccolta per food forest, A_183, A_652, A_653, A_654, A_655.
<br /><br />
30 Agosto 2025 - Concept per un ponte galleggiante (Versione 1.1), A_645, A_651, fix alle API.
<br /><br />
28 Agosto 2025 - Elementi : A_004, A_602, A_644, A_645, A_646, A_647, A_648, A_649, A_650.
-->
<?php

$content = ob_get_contents();
ob_end_clean();
?>
