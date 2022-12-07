<?php
require_once 'bootstrap.php';
$template = sprintf('templates/pages/%s.php', $_SERVER['REQUEST_URI']);
$page = file_exists($template) ? $template : 'templates/pages/home.php';
require_once 'templates/base.php';