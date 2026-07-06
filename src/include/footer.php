<?php

$footer = array("it" => 
    array(
    "Grazie a <a href='http://openclipart.org'>openclipart.org</a> e <a href='http://texturelib.com'>texturelib.com</a> per le loro immagini.",
    "Immagini usate su licenza di shutterstock.com e poliigon.com.",
    "<a href='https://www.vecteezy.com/free-png/logo-telegram'>Logo Telegram PNGs by Vecteezy</a>",
    "Tutti i contenuti in lingua Italiana sono originali, scritti e sviluppati da Marco Bagnaresi - <a href='https://www.mbcraft.it'>MBCRAFT</a>.",
    "Traduzioni in Inglese con Google Translate.",
    "Logo sito da Valentina Fabbri"
    ),
    "en" => array(
    "Thanks to <a href='http://openclipart.org'>openclipart.org</a>, <a href='http://texturelib.com'>texturelib.com</a> for their images.",
    "Images used under license of shutterstock.com and poliigon.com.",
    "<a href='https://www.vecteezy.com/free-png/logo-telegram'>Logo Telegram PNGs da Vecteezy</a>",
    "All content in Italian language originally written and developed by Marco Bagnaresi - <a href='https://www.mbcraft.it'>MBCRAFT</a>.",
    "Translations to English by Google Translate.",
    "Site logo by Valentina Fabbri")
    );

$welcome_page = array("it" => "Pagina di benvenuto",
                "en" => "Welcome page");

function print_footer($elements) {
    foreach ($elements as $el) {
        echo "<div class='footer_credit_line'>";
        echo $el;
        echo "</div>";
    }
}
?>
<footer>
    <div class="footer">
        <div class="footer_social_row">
            <div style="display: inline-block;">
                <a href="https://www.facebook.com/marco.bagnaresi">
                    <img src="/images/icons/facebook_icon2.png" alt="facebook icon" width="48" height="48" />
                </a>
            </div>
            <div style="display: inline-block;width:16px;height:48px;">
            </div>
            <div style="display: inline-block;">
                <a href="https://www.tiktok.com/@marco.bagnaresi">
                    <img src="/images/icons/tiktok_icon2.png" alt="tiktok icon" width="48" height="48" />
                </a>
            </div>
            <div style="display: inline-block;width:16px;height:48px;">
            </div>
            <div style="display: inline-block;">
                <a href="https://t.me/marcobagnaresi">
                    <img src="/images/icons/telegram_icon.png" alt="telegram icon" width="48" height="48" />
                </a>
            </div>
        </div>
        <h3 class="footer_welcome_heading">
        <b><a href="/<?=$lang ?>/index.php"><?= $welcome_page[$lang] ?></a></b>
        </h3>
        <h4 class="footer_credits_heading">
        <?php
            print_footer($footer[$lang]);
        ?>
        </h4>
        <div class="footer_bottom_spacer"></div>
    </div>
</footer>