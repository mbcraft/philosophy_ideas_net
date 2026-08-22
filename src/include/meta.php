<?php
    // Cache-busts /css/*.css using the file's own mtime instead of time(),
    // so the query string (and therefore the browser cache) only changes
    // when the file itself actually changes.
    function asset_version($doc_relative_path) {
        $full_path = ($_SERVER['DOCUMENT_ROOT'] ?? '').$doc_relative_path;
        return file_exists($full_path) ? filemtime($full_path) : time();
    }

    $og_url = "https://www.philosophy-ideas.net".strtok($_SERVER['REQUEST_URI'] ?? '','?');
    $og_image = "https://www.philosophy-ideas.net/images/logo/Logo_Philosophy_Ideas_Small.png";
?>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17768022786"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-17768022786');
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Marco Bagnaresi" />
    <title>Philosophy-ideas.net - <?=htmlspecialchars($title_suffix,ENT_QUOTES,'UTF-8') ?></title>
    <meta name='description' content="<?=htmlspecialchars($description,ENT_QUOTES,'UTF-8') ?>">
    <meta name='keywords' content="<?=htmlspecialchars($keywords,ENT_QUOTES,'UTF-8') ?>">
    <link rel="canonical" href="https://www.philosophy-ideas.net<?=htmlspecialchars(strtok($_SERVER['REQUEST_URI'] ?? '','?'),ENT_QUOTES,'UTF-8') ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Philosophy-ideas.net" />
    <meta property="og:title" content="Philosophy-ideas.net - <?=htmlspecialchars($title_suffix,ENT_QUOTES,'UTF-8') ?>" />
    <meta property="og:description" content="<?=htmlspecialchars($description,ENT_QUOTES,'UTF-8') ?>" />
    <meta property="og:url" content="<?=htmlspecialchars($og_url,ENT_QUOTES,'UTF-8') ?>" />
    <meta property="og:image" content="<?=htmlspecialchars($og_image,ENT_QUOTES,'UTF-8') ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Philosophy-ideas.net - <?=htmlspecialchars($title_suffix,ENT_QUOTES,'UTF-8') ?>" />
    <meta name="twitter:description" content="<?=htmlspecialchars($description,ENT_QUOTES,'UTF-8') ?>" />
    <meta name="twitter:image" content="<?=htmlspecialchars($og_image,ENT_QUOTES,'UTF-8') ?>" />
    <?php
        // Alternate-language URLs, built from the request path only (no query
        // string), so a language switch always lands on the canonical page
        // rather than replaying ?embed=/?with_back_to_results= params.
        $hreflang_parts = explode('/',ltrim(strtok($_SERVER['REQUEST_URI'] ?? '','?'),'/'));

        $hreflang_it_parts = $hreflang_parts; $hreflang_it_parts[0] = "it";
        $hreflang_en_parts = $hreflang_parts; $hreflang_en_parts[0] = "en";

        $hreflang_it_url = "https://www.philosophy-ideas.net/".implode('/',$hreflang_it_parts);
        $hreflang_en_url = "https://www.philosophy-ideas.net/".implode('/',$hreflang_en_parts);
    ?>
    <link rel="alternate" hreflang="it" href="<?=htmlspecialchars($hreflang_it_url,ENT_QUOTES,'UTF-8') ?>" />
    <link rel="alternate" hreflang="en" href="<?=htmlspecialchars($hreflang_en_url,ENT_QUOTES,'UTF-8') ?>" />
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="/css/default.css?<?=asset_version('/css/default.css') ?>">
    <link rel="stylesheet" href="/css/menu.css?<?=asset_version('/css/menu.css') ?>">
    <link rel="stylesheet" href="/css/background_gallery.css?<?=asset_version('/css/background_gallery.css') ?>">
    <link rel="stylesheet" href="/css/buttons.css?<?=asset_version('/css/buttons.css') ?>">
    <link rel="stylesheet" href="/css/mb_fonts.css?<?=asset_version('/css/mb_fonts.css') ?>">
    <script type="text/javascript">
        backgrounds = {white : "white.jpg", bamboo_atlas : "bamboo_atlas.jpg",carpet_loop : "carpet_loop.jpg",ceramic_herringbone : "ceramic_herringbone.jpg", ceramic_triangle : "ceramic_triangle.jpg", ground_grass_field : "ground_grass_field.jpg", ice : "ice.jpg", marble_whitened : "marble_whitened.jpg", wood_flooring_ash_brick_bond : "wood_flooring_ash_brick_bond.jpg" };
    </script>
