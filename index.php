<?php
require_once 'bootstrap.php';

$template = 'templates/pages/home.php';
$title = 'Home';

if (isset($_GET['page'])) {
    $title = $_GET['page'];
    $path = 'templates/pages/' . $_GET['page'] . '.php';
    if (file_exists($path)) {
        $template = $path;
    }
}

require_once 'templates/base.php';