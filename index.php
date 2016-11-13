<?php
//settings for xdebug reporting error
ini_set('xdebug.collect_vars', 'on');
ini_set('xdebug.collect_params', '4');
//ini_set('xdebug.dump_globals', 'on');
//ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
ini_set('xdebug.show_local_vars', 'on');

//Error reporting
error_reporting(E_ALL);

define('ROOT', __DIR__);

require "app/App.php";
App::load();

if (isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'home';
}

ob_start();
if ($page === 'home'){
    require ROOT . "/pages/articles/home.php";
}elseif($page === 'article'){
    require ROOT . "/pages/articles/single.php";
}elseif ($page === 'categorie'){
    require ROOT . "/pages/articles/categorie.php";
}
$content = ob_get_clean();
require ROOT . "/pages/templates/default.php";