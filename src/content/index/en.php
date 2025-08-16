<?php

$title_suffix = "Welcome to philosophy-ideas.net";

$description = "This website contains philosophy research, memes and interesting documents abouts solutions and inventions.";
$keywords = "research, philosphy, meme, documents";

ob_start();

require_once ("include/site_variables.php");

?>
<div align='center' style="padding-top: 30px;">
    <div style="padding:30px;">Welcome to the internet site of</div>
    <img width="300" src='/images/logo/logo_philosophy_temp_transparent.png' alt='Logo website' />
    <br />

    <br />
    <a href="/about.php">More informations</a>
    <br />
    <div style="padding-top:40px;"><h3>Choose your favorite background :</h3></div>
    <?php 
        include('_background_list.php'); 

        if (!$is_open) {
    ?>
    <span style="font-size: 40px;font-weight: bold;">DO NOT ENTER !</span>
    <br />
    <img src="/images/misc/skull_and_bones.png" width="100"/>
    <br />
    <span style="font-size: 20px;font-weight: bold;">( THIS INTERNET SITE IS CLOSED )</span>
    <br />
    <?php
        }
    ?>
    <form method="POST" name="background_enter_form" action="/home.php">
        <input id="BACKGROUND" type="hidden" name="BACKGROUND" value="white" />
        <input class="enter_button" type="submit" value="Enter" <?=$is_open ? '' : 'disabled'?>/>
    </form>
</div>
    <br />
    <div align="center">
    <h4>Last update : 16 August 2025</h4>
    </div>
    <br />
    <br />

<?php
$content = ob_get_contents();
ob_end_clean();
?>
