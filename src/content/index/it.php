<?php

$title_suffix = "Benvenuto in philosophy-ideas.net";

$description = "Questo sito internet contiene elementi di filosofia frutto di ricerca, meme e documenti su soluzioni innovative.";
$keywords = "ricerca, filosofia, meme, documenti";

ob_start();

require_once (DIR_PREFIX."include/site_variables.php");

?>
<div align='center' style="padding-top: 10px;">
    <div style="padding-left:30px;padding-right:30px;">Benvenuto nel sito internet di</div>
    <a href="/it/home.php"><img width="600" src='/images/logo/Logo_Philosophy_Ideas_Small.png' alt='Logo sito internet' /></a>
    <br />
    <br />
    <strong>QUESTO SITO CONTIENE UNA RACCOLTA DI IDEE FILOSOFICHE, MEME E DOCUMENTI ORIGINALI E DI VELOCE LETTURA.</strong>
    <br />
    <br />
    <strong>QUESTO SITO NON CONTIENE PUBBLICITÀ, LA NAVIGAZIONE È AGILE E LEGGERA ANCHE DA SMARTPHONE.</strong>
    <br />
    <?php
    if (!$is_open) {
    ?>
    <span style="font-size: 40px;font-weight: bold;">NON ENTRARE !</span>
    <br />
    <img src="/images/misc/skull_and_bones.png" alt="Skull And Bones" width="100"/>
    <br />
    <span style="font-size: 20px;font-weight: bold;">( QUESTO SITO INTERNET &Egrave; CHIUSO )</span>
    <br />
    <?php
        }
        else { 
    ?>
    <br />

    <a href="/it/home.php"><h2>Clicca qui per entrare</h2></a>
    
    <br />oppure
    <div style="padding-top:10px;"><h3>Usa uno di questi sfondi :</h3></div>
    <?php
        include('_background_list.php');
    ?>

    <form method="POST" name="background_enter_form" action="/it/home.php">
        <input id="BACKGROUND" type="hidden" name="BACKGROUND" value="white" />
        <input class="enter_button" type="submit" value="Entra" />
    </form>
    <?php
        }
    ?>
</div>
    <br />
    <div align="center">
    <h4>Ultimo aggiornamento : 22 Agosto 2026</h4>
    </div>
    <br />
    <br />


<?php
$content = ob_get_contents();
ob_end_clean();
?>
