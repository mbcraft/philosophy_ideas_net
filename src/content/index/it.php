<?php

$title_suffix = "Benvenuto in philosophy-ideas.net";

$description = "Questo sito internet contiene elementi di filosofia frutto di ricerca, meme e documenti su soluzioni innovative.";
$keywords = "ricerca, filosofia, meme, documenti";

ob_start();

require_once (DIR_PREFIX."include/site_variables.php");

?>
<div align='center' style="padding-top: 30px;">
    <div style="padding:30px;">Benvenuto nel sito internet di</div>
    <img width="600" src='/images/logo/Logo_Philosophy_Ideas_Small.png' alt='Logo sito internet' />
    <br />

    <br />
    <a href="/about.php?lang=it">Altre informazioni</a>
    <br />
    <br />
    <strong>QUESTO SITO NON CONTIENE PUBBLICITÀ, LA NAVIGAZIONE È AGILE E LEGGERA</strong>
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

    <a href="/it/home.php">Entra senza usare uno sfondo</a>
    
    <br /><br />oppure
    <div style="padding-top:20px;"><h3>Scegli lo sfondo che preferisci :</h3></div>
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
    <h4>Ultimo aggiornamento : 16 Agosto 2026</h4>
    </div>
    <br />
    <br />


<?php
$content = ob_get_contents();
ob_end_clean();
?>
