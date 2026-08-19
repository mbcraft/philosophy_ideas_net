<?php

$calls_file = __DIR__ . '/data/api_calls_v1.2.json';

$data = [];
if (file_exists($calls_file)) {
    $raw = @file_get_contents($calls_file);
    if ($raw !== false) {
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) {
            $data = $decoded;
        } else {
            // File corrotto: rigenera vuoto
            @file_put_contents($calls_file, '{}');
        }
    }
}

krsort($data);

$all_endpoints = [];
foreach ($data as $endpoints) {
    foreach (array_keys($endpoints) as $e) {
        if (!in_array($e, $all_endpoints)) $all_endpoints[] = $e;
    }
}
sort($all_endpoints);

$grand_totals = array_fill_keys($all_endpoints, 0);
$grand_total = 0;

?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Chiamate API v1.2</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 15px; padding: 30px; background: #f5f5f5; }
        h1 { font-size: 20px; margin-bottom: 20px; }
        table { border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 8px 16px; text-align: center; white-space: nowrap; }
        th { background: #87CEEB; font-weight: bold; }
        td.month { text-align: left; font-weight: bold; }
        tr:nth-child(even) { background: #f0f8ff; }
        .total-row { font-weight: bold; background: #d0ecff; }
        td.zero { color: #bbb; }
    </style>
</head>
<body>
    <h1>Chiamate API mensili — v1.2</h1>
    <?php if (empty($data)): ?>
        <p>Nessuna chiamata registrata.</p>
    <?php else: ?>
    <table>
        <tr>
            <th>Mese</th>
            <?php foreach ($all_endpoints as $e): ?>
                <th><?= htmlspecialchars($e) ?></th>
            <?php endforeach; ?>
            <th>TOTALE</th>
        </tr>
        <?php foreach ($data as $month => $endpoints):
            $row_total = array_sum($endpoints);
            $grand_total += $row_total;
        ?>
        <tr>
            <td class="month"><?= htmlspecialchars($month) ?></td>
            <?php foreach ($all_endpoints as $e):
                $count = $endpoints[$e] ?? 0;
                $grand_totals[$e] += $count;
            ?>
                <td class="<?= $count ? '' : 'zero' ?>"><?= $count ?: '-' ?></td>
            <?php endforeach; ?>
            <td><?= $row_total ?></td>
        </tr>
        <?php endforeach; ?>
        <tr class="total-row">
            <td>TOTALE</td>
            <?php foreach ($all_endpoints as $e): ?>
                <td><?= $grand_totals[$e] ?></td>
            <?php endforeach; ?>
            <td><?= $grand_total ?></td>
        </tr>
    </table>
    <?php endif; ?>
    <br />
    <small>Aggiornato in tempo reale.</small>
</body>
</html>
