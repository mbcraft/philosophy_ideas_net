<?php

$title_suffix = "Philosophy";
$description = "Philosophies and tips to improve the quality of life";
$keywords = "philosophy, tips, friendship";


ob_start();
?>
<div align="center">
	<a href="/<?=$lang ?>/philosophy/H_001.php?with_back_to_results=false">Read the 'H' elements</a> before reading others.
	<br />
	Available element ranges:
	<?php
	print_available_ranges($all_ranges);
	?>
	<br /><br />
	<form name="search_unified" action="/<?=$lang ?>/philosophy.php" method="GET" onsubmit="return unifiedSearch(this)">
		<input type="hidden" name="mode" id="search_mode" value="" />
		<input type="hidden" name="with_back_to_results" value="false" />
		<input type="hidden" name="element_key" id="field_element_key" value="" />
		<input type="hidden" name="search_query" id="field_search_query" value="" />
		<div class="unified_search_group">
			<input type="text" id="unified_input" aria-label="Search by element ID or keywords" placeholder='Element ID (eg: A_123) or keywords' />
			<button type="submit">Search</button>
		</div>
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
	<a href="/<?=$lang ?>/philosophy.php?mode=full_links_list">List of all elements</a>
	&nbsp;|&nbsp;
	<form name="full_list" action="/<?=$lang ?>/philosophy.php" method="GET" style="display:inline;">
		<input type="hidden" name="mode" value="full_list" />
		<button type="submit">Full list</button>
	</form>
</div>
<?php
$search_interface = ob_get_contents();
ob_end_clean();
