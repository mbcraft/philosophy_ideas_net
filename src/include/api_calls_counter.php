<?php

function count_api_call($api_version,$endpoint) {

	$calls_file = PROJECT_DIR."/data/api_calls_".$api_version.".json";
	$month = date('Y-m');

	$fp = @fopen($calls_file, 'c+');
	if (!$fp) return;

	flock($fp, LOCK_EX);
	$raw = stream_get_contents($fp);
	$data = [];
	if ($raw && $raw !== '{}') {
		$decoded = json_decode($raw, true);
		$data = is_array($decoded) ? $decoded : [];
	}
	if (!isset($data[$month])) $data[$month] = [];
	if (!isset($data[$month][$endpoint])) $data[$month][$endpoint] = 0;
	$data[$month][$endpoint]++;
	fseek($fp, 0);
	ftruncate($fp, 0);
	fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
	flock($fp, LOCK_UN);
	fclose($fp);
}
