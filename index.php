<?php
require_once('functions.php');
require_once('config.php');
require_once('data.php');
// include 'data.php';

// Option pour désactiver ou activer le site en cas de mise à jour
if ($config['enable']) {
    $content = require_once($config['tpl_path'] . 'main.php');
} else {
    $error_msg = 'Mise à jour de site. Veuillez revenir plus tard.';
    $content = require_once($config['tpl_path'] . 'off.php');
}
print($content);


// $layout_content = [
//     $main_content = [
//         $lots = [$lot, $lot, $lot]
//     ]
// ];
?>
