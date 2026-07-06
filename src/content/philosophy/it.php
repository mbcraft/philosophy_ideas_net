<?php

$title_suffix = "Filosofia";
$description = "Consigli e tecniche utili per stare meglio";
$keywords = "filosofia, consigli, amicizia";


ob_start();
?>
<div align="center">
	<a href="/<?= $lang ?>/philosophy/H_001.php?with_back_to_results=false">Leggi prima gli elementi 'H'</a> prima di consultare gli altri.
	<br />
	Intervalli di elementi disponibili:
	<?php
	print_available_ranges($all_ranges);
	?>
	<br /><br />
	<form name="search_unified" action="/<?=$lang ?>/philosophy.php" method="GET" onsubmit="return unifiedSearch(this)">
		<input type="hidden" name="mode" id="search_mode" value="" />
		<input type="hidden" name="with_back_to_results" value="false" />
		<input type="hidden" name="element_key" id="field_element_key" value="" />
		<input type="hidden" name="search_query" id="field_search_query" value="" />
		<input type="text" id="unified_input" aria-label="Cerca per ID elemento o per parole chiave" placeholder='ID elemento (es: A_123) o parole chiave' style="width:min(100%,400px);" />
		<button type="submit">Cerca</button>
	</form>
	<script>
	function unifiedSearch(form) {
		var val = document.getElementById('unified_input').value.trim();
		if (/^[a-zA-Z]_?\d+$/.test(val)) {
			document.getElementById('search_mode').value = 'one_element';
			document.getElementById('field_element_key').value = val;
		} else {
			document.getElementById('search_mode').value = 'search_with_words';
			document.getElementById('field_search_query').value = val;
		}
		return true;
	}
	</script>
	<br />
	<a href="/<?=$lang ?>/philosophy.php?mode=full_links_list">Lista di tutti gli elementi</a>
	&nbsp;|&nbsp;
	<form name="full_list" action="/<?=$lang ?>/philosophy.php" method="GET" style="display:inline;">
		<input type="hidden" name="mode" value="full_list" />
		<button type="submit">Elenco completo integrale</button>
	</form>
	<br /><br />
	<div style="text-align:left;">
		API disponibili per sviluppatori:
		<ul>
			<li>Versione 1.0 - <a href="/api/v1.0/get_api_calls_specification.php">Specifiche</a> (formato JSON)</li>
			<li>Versione 1.1 - <a href="/api/v1.1/get_api_calls_specification.php">Specifiche</a> (formato JSON)</li>
			<li>Versione 1.2 - <a href="/api/v1.2/get_api_calls_specification.php">Specifiche</a> (formato JSON) - (<a href="/api/v1.2/sample.html">esempio embed</a>)</li>
		</ul>
	</div>
</div>
<?php
$search_interface = ob_get_contents();
ob_end_clean();
