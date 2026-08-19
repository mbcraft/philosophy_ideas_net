<?php

$title_suffix = "Welcome to philosophy-ideas.net";

$description = "This website contains philosophy research, memes and interesting documents abouts solutions and inventions.";
$keywords = "research, philosphy, meme, documents";

ob_start();

require_once (DIR_PREFIX."include/site_variables.php");

?>
<div align='center' style="padding-top: 30px;">
    <div style="padding:30px;">Welcome to the internet site of</div>
    <img width="600" src='/images/logo/Logo_Philosophy_Ideas_Small.png' alt='Logo website' />
    <br />

    <br />
    <a href="/about.php?lang=en">More informations</a>
    <br />
    <br />
    <strong>THIS WEBSITE CONTAINS NO ADVERTISING, NAVIGATION IS FAST AND LIGHTWEIGHT</strong>
    <br />
    <?php
    if (!$is_open) {
    ?>
    <span style="font-size: 40px;font-weight: bold;">DO NOT ENTER !</span>
    <br />
    <img src="/images/misc/skull_and_bones.png" alt="Skull And Bones" width="100"/>
    <br />
    <span style="font-size: 20px;font-weight: bold;">( THIS INTERNET SITE IS CLOSED )</span>
    <br />
    <?php
        }
        else { 
    ?>
    <br />

    <a href="/en/home.php"><h2>Enter without using a background</h2></a>
    
    <br />or
    <div style="padding-top:10px;"><h3>Choose your favorite background :</h3></div>
    <?php
        include('_background_list.php');
    ?>

    <form method="POST" name="background_enter_form" action="/en/home.php">
        <input id="BACKGROUND" type="hidden" name="BACKGROUND" value="white" />
        <input class="enter_button" type="submit" value="Enter" />
    </form>
    <?php
        }
    ?>
</div>
    <br />
    <div align="center">
    <h4>Last update : 19 August 2026</h4>
    </div>
    <br />
    <br />

<?php
$content = ob_get_contents();
ob_end_clean();
?>
