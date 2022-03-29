<?php ob_start(); ?>
    fdsqfds qfdq fsdq

<?php
$content = ob_get_clean();
$titre = "Login";
require "app/Views/commons/template.php";