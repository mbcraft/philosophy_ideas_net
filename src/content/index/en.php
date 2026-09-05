<?php

$title_suffix = "Welcome to philosophy-ideas.net";

$description = "This website contains philosophy research, memes and interesting documents abouts solutions and inventions.";
$keywords = "research, philosphy, meme, documents";

ob_start();

require_once (DIR_PREFIX."include/site_variables.php");

?>
<div align='center' style="padding-top: 10px;">
    <div style="padding-left:30px;padding-right:30px;">Welcome to the internet site of</div>
    <a href="/en/home.php"><img width="600" src='/images/logo/Logo_Philosophy_Ideas_Small.png' alt='Logo website' /></a>
    <br />
    <br />
    <strong>THIS SITE CONTAINS A COLLECTION OF ORIGINAL, QUICK-READ PHILOSOPHICAL IDEAS, MEMES, AND DOCUMENTS.</strong>
    <br />
    <br />
    <strong>THIS WEBSITE CONTAINS NO ADVERTISING, NAVIGATION IS FAST AND LIGHTWEIGHT.</strong>
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

    <a href="/en/home.php"><h2>Click here to enter</h2></a>
    
    <br />or
    <div style="padding-top:10px;"><h3>Use one of these wallpapers :</h3></div>
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
    <h4>Last update : 05 September 2026</h4>
    </div>
    <br />
    <br />

<?php
$content = ob_get_contents();
ob_end_clean();
?>
