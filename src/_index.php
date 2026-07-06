<?php

require_once(DIR_PREFIX.'include/lang.php');
include_once(DIR_PREFIX."include/visit_counter.php");
include_once(DIR_PREFIX."include/begin_html.php");

include_once(DIR_PREFIX."content/index/".$lang.".php");
include_once(DIR_PREFIX."include/meta.php");
?>
</head>
<body style="background-image:url('/images/background/welcome_background.jpg');background-size: cover;">
    <?php
    include_once(DIR_PREFIX."include/language_switches.php");
    ?>
    <script type="text/javascript">
        background_keys = ['white','bamboo_atlas','carpet_loop','ceramic_herringbone','ceramic_triangle','ground_grass_field','ice','marble_whitened','wood_flooring_ash_brick_bond'];
        function update_selected_background(name) {
            for (i=0;i<background_keys.length;i++) {
                el = document.getElementById(background_keys[i]);
                el.className = "unselected background_image_thumb";
            }
            el = document.getElementById(name);
            el.className = "selected";
            document.getElementById('BACKGROUND').value = name;
        }
    </script>
    <div class="w3-row">
    <?=$content ?>
    </div>

<?php
include_once(DIR_PREFIX."include/end_html.php");
?>