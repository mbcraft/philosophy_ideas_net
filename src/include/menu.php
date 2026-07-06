<?php
$skip_to_content = array("it"=>"Vai al contenuto","en" => "Skip to content");
$menu = array("it" => array("HOME","FILOSOFIA","DIVERTIMENTO","DOCUMENTI"),"en" => array("HOME","PHILOSOPHY","FUN","DOCUMENTS"));
$menu_links = array(
    "home"        => array("it"=>"/it/home.php",        "en"=>"/en/home.php"),
    "philosophy"  => array("it"=>"/it/philosophy.php",  "en"=>"/en/philosophy.php"),
    "fun"         => array("it"=>"/it/fun.php",         "en"=>"/en/fun.php"),
    "docs"        => array("it"=>"/it/docs.php",        "en"=>"/en/docs.php"),
);
?>
<h4 class="skip_to_content_wrapper">
    <a id="skip_to_main_content" href="#main_content"><?=$skip_to_content[$lang] ?></a>
</h4>
<nav>
    <p class="menu_title">Menu:</p>

    <!-- Desktop menu -->
    <div class="w3-cell-row w3-light-blue menu desktop_menu" style="min-width:100%;">
        <a href="/<?=$lang ?>/home.php"        class="w3-cell w3-cell-middle menu_item yellow"><?=$menu[$lang][0] ?></a>
        <a href="/<?=$lang ?>/philosophy.php"  class="w3-cell w3-cell-middle menu_item blue"><?=$menu[$lang][1] ?></a>
        <a href="/<?=$lang ?>/fun.php"         class="w3-cell w3-cell-middle menu_item green"><?=$menu[$lang][2] ?></a>
        <a href="/<?=$lang ?>/docs.php"        class="w3-cell w3-cell-middle menu_item brown"><?=$menu[$lang][3] ?></a>
    </div>

    <!-- Mobile menu -->
    <div class="mobile_menu">
        <button class="hamburger_btn" onclick="toggleMobileMenu()" aria-expanded="false" aria-controls="mobile_nav_items">
            Menu
        </button>
        <div class="mobile_nav_items" id="mobile_nav_items">
            <a href="/<?=$lang ?>/home.php"        class="mobile_menu_item yellow"><?=$menu[$lang][0] ?></a>
            <a href="/<?=$lang ?>/philosophy.php"  class="mobile_menu_item blue"><?=$menu[$lang][1] ?></a>
            <a href="/<?=$lang ?>/fun.php"         class="mobile_menu_item green"><?=$menu[$lang][2] ?></a>
            <a href="/<?=$lang ?>/docs.php"        class="mobile_menu_item brown"><?=$menu[$lang][3] ?></a>
        </div>
    </div>
</nav>
<script>
function toggleMobileMenu() {
    var items = document.getElementById('mobile_nav_items');
    var btn = document.querySelector('.hamburger_btn');
    var isOpen = items.classList.toggle('open');
    btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    btn.textContent = isOpen ? '✕' : 'Menu';
}
</script>
