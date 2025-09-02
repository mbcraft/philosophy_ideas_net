<?php

$footer = array("it" => 
    array(
    "Grazie a <a href='http://openclipart.org'>openclipart.org</a> e <a href='http://texturelib.com'>texturelib.com</a> per le loro immagini.",
    "Immagini usate su licenza di shutterstock.com e poliigon.com.",
    "Tutti i contenuti sono originali, scritti e sviluppati da Marco Bagnaresi - <a href='https://www.mbcraft.it'>MBCRAFT</>.",
    "Traduzioni in Inglese con Google Translate."
    ),
    "en" => array(
    "Thanks to <a href='http://openclipart.org'>openclipart.org</a>, <a href='http://texturelib.com'>texturelib.com</a> for their images.",
    "Images used under license of shutterstock.com and poliigon.com.",
    "All content originally written and developed in Italian by Marco Bagnaresi - <a href='https://www.mbcraft.it'>MBCRAFT</>.",
    "Translations to English by Google Translate.")
    );

$welcome_page = array("it" => "Pagina di benvenuto",
                "en" => "Welcome page");

function print_footer($elements) {
    foreach ($elements as $el) {
        echo "<div style='padding-top:10px;padding-bottom:10px;'>";
        echo $el;
        echo "</div>";
    }
}
?>
<footer>
    <div class="footer">
        <div style="padding-top:32px;padding-bottom:32px;">
            <div style="display: inline-block;">
                <a href="https://www.tiktok.com/@marco.bagnaresi">
                    <img src="/images/icons/tiktok_icon2.png" alt="tiktok icon" />
                </a>
            </div>
        </div> 
        <h3>

        <br />
        <b><a href="/index.php"><?= $welcome_page[$lang] ?></a></b><br />
        <br /><br />
        </h3>
        <h4>
        <?php
            print_footer($footer[$lang]);
        ?>
        </h4>
        <div style="width:100%;height:50px;"></div>
    </div>
    <br />
</footer>